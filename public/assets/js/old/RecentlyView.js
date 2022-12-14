/**
 *
 * Зависимости:
 * jQuery
 * localforage (//cdnjs.cloudflare.com/ajax/libs/localforage/1.4.3/localforage.min.js)
 *
 * Параметры:
 * succes - колбек на получение данных
 * debug - выводит уведомления о процессах
 * use_forage - юзать localforage
 * clear_forage - очистить localforage при запуске
 * keyParameters - ключ в котором хранятся данные localforage
 *
 * HTML/liquid
 * <div data-recently-view="{{ product.id }}"></div>
 *
  Пример вызова:
  var myRecentlyView = new RecentlyView({
   succes: function (_products) {
     console.log(_products);
   },
   debug: true
  })
 *
*/
var RecentlyView = function (options) {
  var self = this;

  var DEFAULT_OPTIONS = {
    debug: false,
    data_selector: '[data-recently-view]',
    clear_forage: false,
    use_forage: true,
    del_current_id: true,
    productIds: [],
    keyParameters: 'recently_view',
    succes: function () {}
  }

  self.option = $.extend(DEFAULT_OPTIONS, options);

  self.setLog('Настройки плагина', self.option);

  self.init();
}
/**
 * Инициализация
 */
RecentlyView.prototype.init = function () {
  var self = this;

  // Если в настройка очистить сторадж при запуске
  if (self.option.clear_forage && localforage) {
    localforage.removeItem(self.option.keyParameters, function () {
      self.setLog('Локальное хранилище очищено', 'Ключ: ' + self.option.keyParameters);
    })
  }

  if (typeof window.localforage == "undefined") {
    console.warn('Не подключен плагин localforage!');
  }

  // получить товары
  self.getProducts().done(function (_products) {
    if (!self.option.del_current_id) {
      self.setLog('Вызов колбека succes');
      self.option.succes(_products);
      self.getIds();

    }else{
      self.getIds(function (_id) {
        if (_id && _products[_id]) {
          delete _products[_id];
          self.setLog('Из списка удален товар с id: ' + _id);
        }

        var sortProducts = [];

        for (var i = 0; i < self.option.productIds.length; i++) {
          var _idProduct = self.option.productIds[i];
          if (_products[_idProduct]) {
            sortProducts.push( _products[_idProduct] );
          }
        }

        self.setLog('Вызов колбека succes');
        self.option.succes(sortProducts);
      });
    }

  }).fail(function (err) {
    self.setLog('Не удалось получить данные', err);
    self.getIds();
  });

};

// Собрать ids
RecentlyView.prototype.getIds = function (_callback) {
  var self = this;

  var data_params = self.option.data_selector.replace(/(?:\[data-*)*\]*/g, '')

  $(self.option.data_selector).each(function(index, el) {
    self.option.productIds.push( ( $(el).data(data_params) ).toString() );
  });

  self.setLocalData( self.unique(self.option.productIds) )

  self.option.productIds = self.unique( self.option.productIds.reverse() );



  if (_callback) {
    var _id = $(''+self.option.data_selector+':first').data(data_params);
    _callback(_id)
  }
}

// Оставить уникальные
RecentlyView.prototype.unique = function (_array) {
  var unique = [];
  for (var i = 0; i < _array.length; i++) {
    if (unique.indexOf(_array[i]) == -1) {
      unique.push(_array[i]);
    }
  }
  return unique;
}


/**
 * Получаем товары
 */
RecentlyView.prototype.getProducts = function () {
  var self = this;
  return $.when(_getProducts())

  function _getProducts() {
    var dfd = jQuery.Deferred();

    if (window.localforage && self.option.use_forage) {
      // пробуем забрать данные из хранилища
      self.getLocalData().done(function (_products) {
        self.option.productIds = _products;

        $.post('/products_by_id/'+ _products.join(',') +'.json')
          .done(function (data) {
            var _productsArray = data.products;
            var _productsObject = {};
            $.each(_productsArray, function(index, _product) {
              _productsObject[_product.id] = self.convertProperties(_product);
            });
            self.setLog('Товары из апи: ', _productsObject);
            dfd.resolve( _productsObject );
          })
          .fail(function (onFail) {
            dfd.resolve( {} );
          });

      }).fail(function () {
        // если хранилище пусто
        dfd.resolve( {} );
      });
    }else{
      dfd.resolve( {} );
    }

    return dfd.promise();
  }
};

// Получить данные из хранилища
RecentlyView.prototype.getLocalData = function () {
  var self = this;
  return $.when(_getLocalData())

  function _getLocalData() {
    var dfd = jQuery.Deferred();

    localforage.getItem(self.option.keyParameters, function(err, localData) {
      if (localData) {
        self.setLog('Данные получены из хранилища', localData);

        dfd.resolve( localData );
      }else{
        self.setLog('Хранилище пусто, данные будут запрошены в kladr.insales.ru');

        dfd.reject('Хранилище пусто');
      }
    });

    return dfd.promise();
  }
};

// Установить свои данные
RecentlyView.prototype.setLocalData = function (newLocals, _setCallback) {
  var self = this;
  var setCallback = _setCallback || function () {};
  if (window.localforage && self.option.use_forage) {
    localforage.setItem(self.option.keyParameters, newLocals, function(err, newlocalData) {
      if (newlocalData) {
        self.setLog('В хранилище обновлены данные через метод setLocalData', newlocalData);
        setCallback(newlocalData);
      }else{
        self.setLog('Не удалось обновить данные');
      }
    });
  }
};

// развертка параметров для товара
RecentlyView.prototype.convertProperties = function (_product) {
  _product.parameters = {};
  _product.sale = null;

  // Имя параметра: массив характеристик
  $.each( _product.properties, function( index, property ){

    $.each( _product.characteristics, function( index, characteristic ){
      if (property.id === characteristic.property_id) {
        var _characteristic = characteristic;
        _characteristic.property_name = property.title;
        _characteristic.property = {
          backoffice: property.backoffice,
          id: property.id,
          is_hidden: property.is_hidden,
          is_navigational: property.is_navigational,
          permalink: property.permalink,
          position: property.position,
          title: property.title
        };
        (_product.parameters[ property.permalink ] || (_product.parameters[ property.permalink ] = [])).push(_characteristic);
      }
    });

  });

  // Скидка в процентах
  if (_product.variants) {
    $.each( _product.variants, function( index, variant ){
      if (variant.old_price) {
        var _percent = ((parseInt(variant.old_price) - parseInt(variant.price)) / parseInt(variant.old_price) * 100);
        var _merge = Math.round(_percent);
        if (_merge < 100) {
          _product.sale = _merge;
        }
      }
    });
  }

  return _product;
}

// Дебагер
RecentlyView.prototype.setLog = function (_name, _variable) {
  var self = this;
  if (self.option.debug) {
    console.info('==RecentlyView==');
    console.log(_name);
    if (_variable) {
      console.log(_variable);
    }
    console.log('///////////////////');
    console.log('///RecentlyView///');
    console.log('/////////////////');
  }
};
