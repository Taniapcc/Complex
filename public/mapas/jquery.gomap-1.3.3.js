/ **
 * jQuery goMap
 * *
 * @url http://www.pittss.lv/jquery/gomap/
 * @autor Jevgenijs Shtrauss <pittss@gmail.com>
 * @ versión 1.3.3 2014.11.27
 * Este software se publica bajo la licencia MIT <http://www.opensource.org/licenses/mit-license.php>
 * /

(función ($) {
	geocoder var = nuevo google.maps.Geocoder ();

	función MyOverlay (mapa) {this.setMap (mapa); };
	MyOverlay.prototype = new google.maps.OverlayView ();
	MyOverlay.prototype.onAdd = function () {};
	MyOverlay.prototype.onRemove = function () {};
	MyOverlay.prototype.draw = function () {};

	$ .goMap = {};

	$ .fn.goMap = función (opciones) {
		devuelve this.each (function () {
			var goMap = $ (this) .data ('goMap');
			if (! goMap) {
				var goMapBase = $ .extend (verdadero, {}, $ .goMapBase);
				$ (this) .data ('goMap', goMapBase.init (this, opciones));
				$ .goMap = goMapBase;
			}
			más {
				$ .goMap = goMap;
			}
		});
	};

	$ .goMapBase = {
		valores predeterminados: {
			dirección: '', // calle, ciudad, país
			latitud: 56,9,
			longitud: 24,1,
			zoom: 4,
			retraso: 200,
			hideByClick: verdadero,
			oneInfoWindow: verdadero,
			prefixId: 'gomarker',
			polyId: 'gopoly',
			groupId: 'gogroup',
		    navigationControl: true, // Mostrar u ocultar el control de navegación
			navigationControlOptions: {
				posición: 'TOP_LEFT', // TOP, TOP_LEFT, TOP_RIGHT, BOTTOM, BOTTOM_LEFT, BOTTOM_RIGHT, LEFT, RIGHT
				estilo: 'POR DEFECTO' // POR DEFECTO, PEQUEÑO, GRANDE
			},
		    mapTypeControl: true, // Muestra u oculta el control del mapa
			mapTypeControlOptions: {
				posición: 'TOP_RIGHT', // TOP, TOP_LEFT, TOP_RIGHT, BOTTOM, BOTTOM_LEFT, BOTTOM_RIGHT, LEFT, RIGHT
				estilo: 'DEFAULT' // DEFAULT, DROPDOWN_MENU, HORIZONTAL_BAR
			},
		    scaleControl: false, // Mostrar u ocultar escala
			rueda de desplazamiento: verdadero, // Rueda de desplazamiento del mouse
		    instrucciones: falso,
		    direccionesResultado: nulo,
			disableDoubleClickZoom: falso,
			streetViewControl: falso,
			marcadores: [],
			superposiciones: [],
			polilínea: {
				color: '# FF0000',
				opacidad: 1.0,
				peso: 2
			},
			polígono: {
				color: '# FF0000',
				opacidad: 1.0,
				peso: 2,
				fillColor: '# FF0000',
				fillOpacity: 0.2
			},
			circulo: {
				color: '# FF0000',
				opacidad: 1.0,
				peso: 2,
				fillColor: '# FF0000',
				fillOpacity: 0.2
			},
			rectángulo: {
				color: '# FF0000',
				opacidad: 1.0,
				peso: 2,
				fillColor: '# FF0000',
				fillOpacity: 0.2
			},
			tipo de mapa: 'HÍBRIDO', // Tipo de mapa: HÍBRIDO, HOJA DE RUTA, SATÉLITE, TERRENO
			html_prepend: '<div class = "gomapMarker">',
			html_append: '</div>',
			addMarker: falso
		},		
		mapa: nulo,
		cuenta: 0,
		marcadores: [],
		polilíneas: [],
		polígonos: [],
		círculos: [],
		rectángulos: [],
		tmpMarkers: [],
		geoMarkers: [],
		lockGeocode: falso,
		límites: nulo,
		superposiciones: nulo,
		superposición: nulo,
		mapId: null,
		plId: nulo,
		pgId: nulo
		cid: nulo
		rId: nulo
		opta por nulo
		centerLatLng: null,

		init: function (el, opciones) {
			var opts = $ .extend (verdadero, {}, $ .goMapBase.defaults, opciones);
			this.mapId = $ (el);
			this.opts = opts;

			if (opts.address)
				this.geocode ({dirección: opts.address, center: true});
// más if (opts.latitude! = $ .goMapBase.defaults.latitude && opts.longitude! = $ .goMapBase.defaults.longitude)
// this.centerLatLng = new google.maps.LatLng (opts.latitude, opts.longitude);
			más si ($ .isArray (opts.markers) && opts.markers.length> 0) {
				if (opts.markers [0] .address)
					this.geocode ({dirección: opts.markers [0] .address, center: true});
				más
					this.centerLatLng = new google.maps.LatLng (opts.markers [0] .latitude, opts.markers [0] .longitude);
			}
			más
				this.centerLatLng = new google.maps.LatLng (opts.latitude, opts.longitude);

			var myOptions = {
				centro: this.centerLatLng,
				disableDoubleClickZoom: opts.disableDoubleClickZoom,
		        mapTypeControl: opts.mapTypeControl,
				streetViewControl: opts.streetViewControl,
				mapTypeControlOptions: {
					position: google.maps.ControlPosition [opts.mapTypeControlOptions.position.toUpperCase ()],
					estilo: google.maps.MapTypeControlStyle [opts.mapTypeControlOptions.style.toUpperCase ()]
				},
				mapTypeId: google.maps.MapTypeId [opts.maptype.toUpperCase ()],
				panControl: opts.navigationControl,
				zoomControl: opts.navigationControl,
				panControlOptions: {
					position: google.maps.ControlPosition [opts.navigationControlOptions.position.toUpperCase ()]
				},
				zoomControlOptions: {
					position: google.maps.ControlPosition [opts.navigationControlOptions.position.toUpperCase ()],
					estilo: google.maps.ZoomControlStyle [opts.navigationControlOptions.style.toUpperCase ()]
				},
		        scaleControl: opts.scaleControl,
		        rueda de desplazamiento: opts.scrollwheel,
				zoom: opts.zoom
			};

			this.map = new google.maps.Map (el, myOptions);
			this.overlay = new MyOverlay (this.map);

			this.overlays = { 
				polyline: {id: 'plId', array: 'polylines', create: 'createPolyline'},
				polígono: {id: 'pgId', matriz: 'polígonos', crear: 'createPolygon'},
				circle: {id: 'cId', array: 'circles', create: 'createCircle'},
				rectángulo: {id: 'rId', matriz: 'rectángulos', crear: 'createRectangle'}
			};

			this.plId = $ ('<div style = "display: none;" />'). appendTo (this.mapId);
			this.pgId = $ ('<div style = "display: none;" />'). appendTo (this.mapId);
			this.cId = $ ('<div style = "display: none;" />'). appendTo (this.mapId);
			this.rId = $ ('<div style = "display: none;" />'). appendTo (this.mapId);

			para (var j = 0, l = opts.markers.length; j <l; j ++)
				this.createMarker (opts.markers [j]);

			for (var j = 0, l = opts.overlays.length; j <l; j ++)
				this [this.overlays [opts.overlays [j] .type] .create] (opts.overlays [j]);

			var goMap = esto;
			if (opts.addMarker == verdadero || opts.addMarker == 'multi') {
				google.maps.event.addListener (goMap.map, 'click', function (event) {
					opciones var = {
						position: event.latLng,
						arrastrable: verdadero
					};

					marcador var = goMap.createMarker (opciones);

					google.maps.event.addListener (marcador, 'dblclick', función (evento) {
						marker.setMap (nulo);
						goMap.removeMarker (marker.id);
					});

				});
			}
			sino if (opts.addMarker == 'single') {
				google.maps.event.addListener (goMap.map, 'click', function (event) {
					if (! goMap.singleMarker) {
						opciones var = {
							position: event.latLng,
							arrastrable: verdadero
						};

						marcador var = goMap.createMarker (opciones);
						goMap.singleMarker = true;

						google.maps.event.addListener (marcador, 'dblclick', función (evento) {
							marker.setMap (nulo);
							goMap.removeMarker (marker.id);
							goMap.singleMarker = false;
						});
					}
				});
			}
			eliminar opts.markers;
			eliminar opts.overlays;

			devuelve esto;
		},

		listo: función (f) {
			google.maps.event.addListenerOnce (this.map, 'limits_changed', function () { 
				volver f ();
		    }); 
		},

		geocode: función (dirección, opciones) {
			var goMap = esto;
			setTimeout (function () {
				geocoder.geocode ({'address': address.address}, function (resultados, estado) {
		        	if (estado == google.maps.GeocoderStatus.OK && address.center)
						goMap.map.setCenter (resultados [0] .geometry.location);

					if (estado == google.maps.GeocoderStatus.OK && options && options.markerId)
						options.markerId.setPosition (resultados [0] .geometry.location);

					si no (status == google.maps.GeocoderStatus.OK && options) {
						if (goMap.lockGeocode) {
							goMap.lockGeocode = false;
							options.position = results [0] .geometry.location;
							options.geocode = true;
							goMap.createMarker (opciones);
						}
					}
					si no (status == google.maps.GeocoderStatus.OVER_QUERY_LIMIT) {
						goMap.geocode (dirección, opciones);
					}
   	   			});
			}, this.opts.delay);
		},

		geoMarker: function () {
			if (this.geoMarkers.length> 0 &&! this.lockGeocode) {
				this.lockGeocode = true;
				var current = this.geoMarkers.splice (0, 1);
				this.geocode ({dirección: actual [0]. dirección}, actual [0]);
			}
			si no (this.lockGeocode) {
				var goMap = esto;
				setTimeout (function () {
					goMap.geoMarker ();
				}, this.opts.delay);
			}
		},

		setMap: function (opciones) {
			eliminar opciones.mapTypeId;

			if (options.address) {
				this.geocode ({dirección: opciones.dirección, centro: verdadero});
				eliminar options.address;
			}
			sino if (options.latitude && options.longitude) {
				options.center = new google.maps.LatLng (options.latitude, options.longitude);
				eliminar opciones.longitud;
				eliminar opciones.latitud;
			}

			if (options.mapTypeControlOptions && options.mapTypeControlOptions.position)
				options.mapTypeControlOptions.position = google.maps.ControlPosition [options.mapTypeControlOptions.position.toUpperCase ()];

			if (options.mapTypeControlOptions && options.mapTypeControlOptions.style)
				options.mapTypeControlOptions.style = google.maps.MapTypeControlStyle [options.mapTypeControlOptions.style.toUpperCase ()];

			if (typeof options.navigationControl! == 'undefined') {
				options.panControl = options.navigationControl;
				options.zoomControl = options.navigationControl;
			}
			
			if (options.navigationControlOptions && options.navigationControlOptions.position) {
				options.panControlOptions = {position: google.maps.ControlPosition [options.navigationControlOptions.position.toUpperCase ()]};
				options.zoomControlOptions = {position: google.maps.ControlPosition [options.navigationControlOptions.position.toUpperCase ()]};
			}

			if (options.navigationControlOptions && options.navigationControlOptions.style) {
				if (typeof options.zoomControlOptions === 'undefined')
					options.zoomControlOptions = {estilo: google.maps.ZoomControlStyle [options.navigationControlOptions.style.toUpperCase ()]};
				más
					options.zoomControlOptions.style = google.maps.ZoomControlStyle [options.navigationControlOptions.style.toUpperCase ()];
			}
			this.map.setOptions (opciones);
		},

		getMap: function () {
		   devuelve this.map;
		},

		createListener: function (tipo, evento, datos) {
			objetivo var;

			if (typeof type! = 'objeto')
				tipo = {tipo: tipo};

			if (type.type == 'mapa')
				target = this.map;
			si no (type.type == 'marker' && type.marker)
				target = $ (this.mapId) .data (type.marker);
			más if (type.type == 'info' && type.marker)
				target = $ (this.mapId) .data (type.marker + 'info');

			si (objetivo)
				return google.maps.event.addListener (objetivo, evento, datos);
			de lo contrario if ((type.type == 'marker' || type.type == 'info') && this.getMarkerCount ()! = this.getTmpMarkerCount ())
				var goMap = esto;
				setTimeout (function () {
					goMap.createListener (tipo, evento, datos);
				}, this.opts.delay);
		},

		removeListener: function (escucha) {
			google.maps.event.removeListener (escucha);
		},

		setInfoWindow: function (marcador, html) {
			var goMap = esto;
			html.content = goMap.opts.html_prepend + html.content + goMap.opts.html_append;
			var infowindow = new google.maps.InfoWindow (html);
			infowindow.show = false;

			$ (goMap.mapId) .data (marker.id + 'info', ventana de información);

			if (html.popup) {
				goMap.openWindow (ventana de información, marcador, html);
				infowindow.show = true;
			}

			google.maps.event.addListener (marcador, 'clic', función () {
				if (infowindow.show && goMap.opts.hideByClick) {
					infowindow.close ();
					infowindow.show = false;
				}
				más {
					goMap.openWindow (ventana de información, marcador, html);
					infowindow.show = true;
				}
			});
		},

		openWindow: función (ventana de información, marcador, html) {
			var goMap = esto;
			if (this.opts.oneInfoWindow)
				this.clearInfo ();

			if (html.ajax) {
				infowindow.open (this.map, marcador);
				$ .ajax ({
					url: html.ajax,
					éxito: función (html) {
						infowindow.setContent (goMap.opts.html_prepend + html + goMap.opts.html_append);
					}
				});
			}
			si no (html.id) {
				infowindow.setContent (goMap.opts.html_prepend + $ (html.id) .html () + goMap.opts.html_append);
				infowindow.open (this.map, marcador);
			}
			más
				infowindow.open (this.map, marcador);
		},

		setInfo: function (id, text) {
			var info = $ (this.mapId) .data (id + 'info');

			if (typeof text == 'objeto')
				info.setOptions (goMap.opts.html_prepend + text + goMap.opts.html_append);
			más
				info.setContent (goMap.opts.html_prepend + text + goMap.opts.html_append);
		},

		getInfo: function (id, hideDiv) {
			 var info = $ (this.mapId) .data (id + 'info'). getContent ();
			si (hideDiv)
				return $ (info) .html ();
			más
				información de retorno;
		},

		clearInfo: function () {
			para (var i = 0, l = this.markers.length; i <l; i ++) {
				var info = $ (this.mapId) .data (this.markers [i] + 'info');
				if (info) {
					info.close ();
					info.show = falso;
				}
			}
		},

		fitBounds: función (tipo, marcadores) {
			var goMap = esto;
			if (this.getMarkerCount ()! = this.getTmpMarkerCount ())
				setTimeout (function () {
					goMap.fitBounds (tipo, marcadores);
				}, this.opts.delay);
			más {
				this.bounds = new google.maps.LatLngBounds ();

				if (! type || (type && type == 'all')) {
					para (var i = 0, l = this.markers.length; i <l; i ++) {
						this.bounds.extend ($ (this.mapId) .data (this.markers [i]). position);
					}
				}
				si no (escriba && type == 'visible') {
					para (var i = 0, l = this.markers.length; i <l; i ++) {
						if (this.getVisibleMarker (this.markers [i]))
							this.bounds.extend ($ (this.mapId) .data (this.markers [i]). position);
					}
	
				}
				sino if (type && type == 'markers' && $ .isArray (markers)) {
					para (var i = 0, l = marcadores.length; i <l; i ++) {
						this.bounds.extend ($ (this.mapId) .data (marcadores [i]). position);
					}
				}
				this.map.fitBounds (this.bounds);
			}
		},

		getBounds: function () {
			devuelve this.map.getBounds ();
		},

		createPolyline: function (poly) {
			poly.type = 'polilínea';
			devuelve this.createOverlay (poly);
		},

		createPolygon: function (poly) {
			poly.type = 'polígono';
			devuelve this.createOverlay (poly);
		},

		createCircle: function (poly) {
			poly.type = 'círculo';
			devuelve this.createOverlay (poly);
		},

		createRectangle: function (poly) {
			poly.type = 'rectángulo';
			devuelve this.createOverlay (poly);
		},

		createOverlay: function (poly) {
			superposición var = [];
			if (! poly.id) {
				this.count ++;
				poly.id = this.opts.polyId + this.count;
			}
			interruptor (tipo poli) {
				caso 'polilínea':
					if (poly.coords.length> 0) {
						para (var j = 0, l = poly.coords.length; j <l; j ++)
							overlay.push (nuevo google.maps.LatLng (poly.coords [j] .latitude, poly.coords [j] .longitude));

						superposición = nueva google.maps.Polyline ({
							map: this.map,
							camino: superposición,
							strokeColor: poly.color? poly.color: this.opts.polyline.color,
							strokeOpacity: poly.opacity? poly.opacity: this.opts.polyline.opacity,
							strokeWeight: poly.weight? poly.weight: this.opts.polyline.weight
						});
					}
					más
						falso retorno;
					rotura;
				caso 'polígono':
					if (poly.coords.length> 0) {
						para (var j = 0, l = poly.coords.length; j <l; j ++)
							overlay.push (nuevo google.maps.LatLng (poly.coords [j] .latitude, poly.coords [j] .longitude));

						superposición = nuevo google.maps.Polygon ({
							map: this.map,
							camino: superposición,
							strokeColor: poly.color? poly.color: this.opts.polygon.color,
							strokeOpacity: poly.opacity? poly.opacity: this.opts.polygon.opacity,
							strokeWeight: poly.weight? poly.weight: this.opts.polygon.weight,
							fillColor: poly.fillColor? poly.fillColor: this.opts.polygon.fillColor,
							fillOpacity: poly.fillOpacity? poly.fillOpacity: this.opts.polygon.fillOpacity
						});
					}
					más
						falso retorno;
					rotura;
				caso 'círculo':
					superposición = nuevo google.maps.Circle ({
						map: this.map,
						centro: nuevo google.maps.LatLng (poly.latitude, poly.longitude),
						radio: poli.radio,
						strokeColor: poly.color? poly.color: this.opts.circle.color,
						strokeOpacity: poly.opacity? poly.opacity: this.opts.circle.opacity,
						strokeWeight: poly.weight? poly.weight: this.opts.circle.weight,
						fillColor: poly.fillColor? poly.fillColor: this.opts.circle.fillColor,
						fillOpacity: poly.fillOpacity? poly.fillOpacity: this.opts.circle.fillOpacity
					});
					rotura;
				caso 'rectángulo':
					superposición = nuevo google.maps.Rectangle ({
						map: this.map,
						límites: new google.maps.LatLngBounds (new google.maps.LatLng (poly.sw.latitude, poly.sw.longitude), new google.maps.LatLng (poly.ne.latitude, poly.ne.longitude),
						strokeColor: poly.color? poly.color: this.opts.circle.color,
						strokeOpacity: poly.opacity? poly.opacity: this.opts.circle.opacity,
						strokeWeight: poly.weight? poly.weight: this.opts.circle.weight,
						fillColor: poly.fillColor? poly.fillColor: this.opts.circle.fillColor,
						fillOpacity: poly.fillOpacity? poly.fillOpacity: this.opts.circle.fillOpacity
					});
					rotura;
				defecto:
					falso retorno;
					rotura;
			}
			this.addOverlay (poli, superposición);
			superposición de retorno;
		},

		addOverlay: función (poli, superposición) {
			$ (this [this.overlays [poly.type] .id]). data (poly.id, overlay);
			this [this.overlays [poly.type] .array] .push (poly.id);
		},

		setOverlay: función (tipo, superposición, opciones) {
			overlay = $ (this [this.overlays [type] .id]). data (overlay);

			if (options.coords && options.coords.length> 0) {
				var matriz = [];
				for (var j = 0, l = options.coords.length; j <l; j ++)
					array.push (nuevo google.maps.LatLng (options.coords [j] .latitude, options.coords [j] .longitude));

				opciones.path = array;
				eliminar opciones.coords;
			}
			más if (options.ne && options.sw) {
				options.bounds = new google.maps.LatLngBounds (new google.maps.LatLng (options.sw.latitude, options.sw.longitude), new google.maps.LatLng (options.ne.latitude, options.ne.longitude) );
				eliminar opciones.ne;
				eliminar options.sw;
			}
			sino if (options.latitude && options.longitude) {

				options.center = new google.maps.LatLng (options.latitude, options.longitude);
				eliminar opciones.latitud;
				eliminar opciones.longitud;
			}
			overlay.setOptions (opciones);
		},

		showHideOverlay: function (type, overlay, display) {
			if (typeof display === 'undefined') {
				if (this.getVisibleOverlay (tipo, superposición))
					display = false;
				más
					display = true;
			}

			si (mostrar)
				$ (this [this.overlays [type] .id]). data (overlay) .setMap (this.map);
			más
				$ (this [this.overlays [type] .id]). data (overlay) .setMap (null);
		},

		getVisibleOverlay: función (tipo, superposición) {
			if ($ (this [this.overlays [type] .id]). data (overlay) .getMap ())
				volver verdadero;
			más
				falso retorno;
		},

		getOverlaysCount: function (type) {
			devuelve this [this.overlays [type] .array] .length;
		},

		removeOverlay: function (type, overlay) {
			var index = $ .inArray (overlay, this [this.overlays [type] .array]), current;
			if (índice> -1) {
				current = this [this.overlays [type] .array] .splice (índice, 1);
				var markerId = actual [0];
				$ (this [this.overlays [type] .id]). data (markerId) .setMap (null);
				$ (this [this.overlays [type] .id]). removeData (markerId);

				volver verdadero;
			}
			falso retorno;
		},

		clearOverlays: function (type) {
			for (var i = 0, l = this [this.overlays [type] .array] .length; i <l; i ++) {
				var markerId = this [this.overlays [type] .array] [i];
				$ (this [this.overlays [type] .id]). data (markerId) .setMap (null);
				$ (this [this.overlays [type] .id]). removeData (markerId);
			}
			this [this.overlays [type] .array] = [];
		},

		showHideMarker: function (marcador, pantalla) {
			if (typeof display === 'undefined') {
				if (this.getVisibleMarker (marcador)) {
					$ (this.mapId) .data (marcador) .setVisible (falso);
					var info = $ (this.mapId) .data (marcador + 'info');
					if (info && info.show) {
						info.close ();
						info.show = falso;
					}
				}
				más
					$ (this.mapId) .data (marcador) .setVisible (verdadero);
			}
			más
				$ (this.mapId) .data (marcador) .setVisible (mostrar);
		},

		showHideMarkerByGroup: function (group, display) {
			para (var i = 0, l = this.markers.length; i <l; i ++) {
				var markerId = this.markers [i];
				marcador var = $ (this.mapId) .data (markerId);
				if (marcador.grupo == grupo) {
					if (typeof display === 'undefined') {
						if (this.getVisibleMarker (markerId)) {
							marker.setVisible (falso);
							var info = $ (this.mapId) .data (markerId + 'info');
							if (info && info.show) {
								info.close ();
								info.show = falso;
							}
						}
						más
							marker.setVisible (verdadero);
					}
					más
						marker.setVisible (pantalla);
				}
			}
		},

		getVisibleMarker: function (marcador) {
			return $ (this.mapId) .data (marcador) .getVisible ();
		},

		getMarkerCount: function () {
			devuelve this.markers.length;
		},

		getTmpMarkerCount: function () {
			devuelve this.tmpMarkers.length;
		},

		getVisibleMarkerCount: function () {
			devuelve this.getMarkers ('visiblesInMap'). length;
		},

		getMarkerByGroupCount: function (group) {
			devuelve this.getMarkers ('grupo', grupo) .length;
		},

		getMarkers: function (tipo, nombre) {
			var matriz = [];
			interruptor (tipo) {
				caso "json":
					para (var i = 0, l = this.markers.length; i <l; i ++) {
						var temp = "'" + i + "': '" + $ (this.mapId) .data (this.markers [i]). getPosition (). toUrlValue () + "'";
						array.push (temp);
					}
					array = "{'marcadores': {" + array.join (",") + "}}";
					rotura;
				caso "datos":
					para (var i = 0, l = this.markers.length; i <l; i ++) {
						var temp = "marker [" + i + "] =" + $ (this.mapId) .data (this.markers [i]). getPosition (). toUrlValue ();
						array.push (temp);
					}
					array = array.join ("&"); 					
					rotura;
				caso "visiblesInBounds":
					para (var i = 0, l = this.markers.length; i <l; i ++) {
						if (this.isVisible ($ (this.mapId) .data (this.markers [i]). getPosition ()))
							array.push (this.markers [i]);
					}
					rotura;
				caso "visiblesInMap":
					para (var i = 0, l = this.markers.length; i <l; i ++) {
						if (this.getVisibleMarker (this.markers [i]))
							array.push (this.markers [i]);
					}
					rotura;
				caso "grupo":
					si (nombre)
						para (var i = 0, l = this.markers.length; i <l; i ++) {
							if ($ (this.mapId) .data (this.markers [i]). group == name)
								array.push (this.markers [i]);
						}
					rotura;
				"marcadores" de la caja:
					para (var i = 0, l = this.markers.length; i <l; i ++) {
						var temp = $ (this.mapId) .data (this.markers [i]);
						array.push (temp);
					}
					rotura;
				defecto:
					para (var i = 0, l = this.markers.length; i <l; i ++) {
						var temp = $ (this.mapId) .data (this.markers [i]). getPosition (). toUrlValue ();
						array.push (temp);
					}
					rotura;
			}
			matriz de retorno;
		},

		getVisibleMarkers: function () {
			devuelve this.getMarkers ('visiblesInBounds');
		},

		createMarker: function (marcador) {
			if (! marker.geocode) {
				this.count ++;
				if (! marker.id)
					marker.id = this.opts.prefixId + this.count;
				this.tmpMarkers.push (marker.id);
			}
			if (marker.address &&! marker.geocode) {
				this.geoMarkers.push (marcador);
				this.geoMarker ();
			}
			si no (marker.latitude && marker.longitude || marker.position) {
				opciones var = {map: this.map};
				opciones.id = marcador.id;
				opciones.group = marker.group? marker.group: this.opts.groupId;
				opciones.zIndex = marcador.zIndex? marker.zIndex: 0;
				options.zIndexOrg = marker.zIndexOrg? marker.zIndexOrg: 0;

				if (marcador.visible == falso)
					opciones.visible = marcador.visible;

				if (marcador.título)
					opciones.titulo = marcador.titulo;

				if (marcador.draggable)
					opciones.draggable = marcador.draggable;

				if (marker.icon && marker.icon.image) {
					opciones.icon = marcador.icon.imagen;
					si (marker.icon.shadow)
						opciones.shadow = marker.icon.shadow;
				}
				si no (marcador.icon)
					opciones.icon = marcador.icon;

				si no (this.opts.icon && this.opts.icon.image) {
					opciones.icon = this.opts.icon.image;
					if (this.opts.icon.shadow)
						opciones.shadow = this.opts.icon.shadow;
				}
				si no (this.opts.icon)
					opciones.icon = this.opts.icon;

				opciones.posición = marcador.posición? marker.position: new google.maps.LatLng (marker.latitude, marker.longitude);

				var cmarker = new google.maps.Marker (opciones);

				if (marker.html) {
					if (! marker.html.content &&! marker.html.ajax &&! marker.html.id)
						marker.html = {content: marker.html};
					más si (! marker.html.content)
						marker.html.content = null;

					this.setInfoWindow (cmarker, marker.html);
				}
				this.addMarker (cmarker);
				cmarker de retorno;
			}
		},

		addMarker: function (marcador) {
			$ (this.mapId) .data (marker.id, marker);
			this.markers.push (marker.id);
		},

		setMarker: function (marcador, opciones) {
			tmarker var = $ (this.mapId) .data (marcador);

			eliminar options.id;
			eliminar opciones.visible;

			if (options.icon) {
				var toption = options.icon;
				eliminar opciones.icon;

				if (toption && toption == 'predeterminado') {
					if (this.opts.icon && this.opts.icon.image) {
						opciones.icon = this.opts.icon.image;
						if (this.opts.icon.shadow)
							opciones.shadow = this.opts.icon.shadow;
					}
					si no (this.opts.icon)
						opciones.icon = this.opts.icon;
				}
				si no (toption && toption.image) {
					options.icon = toption.image;
					if (toption.shadow)
						options.shadow = toption.shadow;
				}
				si no (toption)
					options.icon = toption;
			}

			if (options.address) {
				this.geocode ({address: options.address}, {markerId: tmarker});
				eliminar options.address;
				eliminar opciones.latitud;
				eliminar opciones.longitud;
				eliminar opciones.posición;
			}
			más if (options.latitude && options.longitude || options.position) {
				if (! options.position)
					options.position = new google.maps.LatLng (options.latitude, options.longitude);
			}
			tmarker.setOptions (opciones);
		},

		removeMarker: function (marcador) {
			índice var = $ .inArray (marcador, this.markers), actual;
			if (índice> -1) {
				this.tmpMarkers.splice (índice, 1);
				actual = this.markers.splice (índice, 1);
				var markerId = actual [0];
				marcador var = $ (this.mapId) .data (markerId);
				var info = $ (this.mapId) .data (markerId + 'info');

				marker.setVisible (falso);
				marker.setMap (nulo);
				$ (this.mapId) .removeData (markerId);

				if (info) {
					info.close ();
					info.show = falso;
					$ (this.mapId) .removeData (markerId + 'info');
				}
				volver verdadero;
			}
			falso retorno;
		},

		clearMarkers: function () {
			para (var i = 0, l = this.markers.length; i <l; i ++) {
				var markerId = this.markers [i];
				marcador var = $ (this.mapId) .data (markerId);
				var info = $ (this.mapId) .data (markerId + 'info');

				marker.setVisible (falso);
				marker.setMap (nulo);
				$ (this.mapId) .removeData (markerId);

				if (info) {
					info.close ();
					info.show = falso;
					$ (this.mapId) .removeData (markerId + 'info');
				}
			}
			this.singleMarker = false;
			this.lockGeocode = false;
			this.markers = [];
			this.tmpMarkers = [];
			this.geoMarkers = [];
		},

		isVisible: function (latlng) {
			devuelve this.map.getBounds (). contiene (latlng);
		}
	}
}) (jQuery);