<!DOCTYPE HTML>
<html style="overflow-x: hidden;">
<head>
  <title>GEFS Online - Free Flight Simulator</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <meta name="keywords" content="flight simulator, game, free, online, multiplayer, simulation, joystick, aviation, helicopter, hot air balloon, aircraft, pilot">
  <meta name="description" content="A free, online, multiplayer flight simulator based on worldwide aerial imagery.">
  <meta name="viewport" content="width=device-width, height=device-height, initial-scale=0.7">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"><link rel="apple-touch-icon-precomposed" href="apple-touch-icon.png">
  <link rel="shortcut icon" href="favicon.ico">
  <script defer src="https://code.getmdl.io/1.1.3/material.min.js" obfuscation="none"></script>
  <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.amber-indigo.min.css" obfuscation="none">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" obfuscation="none">
  <script type="text/javascript" src="http://www.google-analytics.com/ga.js" obfuscation="none"></script>
  <script id="gekey" src="http://www.google.com/jsapi?key=ABQIAAAAxGP02Znit2t6IlHB2JFcixRjhlbp8b0hzfpNZzrbcu9nH1Ee_xQ_JsMHSfN13E_16aOLidvJQf5J2A" obfuscation="none"></script>

  <script type="text/javascript" obfuscation="none">

      window.gefs = window.gefs || {};

      gefs.communityAircraftMap = {};

      gefs.communityAircraftMap['235']='backend/aircraft/repository/GXD01E_126645_235';gefs.communityAircraftMap['236']='backend/aircraft/repository/GXD02RZ_126645_236';gefs.communityAircraftMap['237']='backend/aircraft/repository/GXD03FI_126645_237';gefs.communityAircraftMap['238']='backend/aircraft/repository/GXD04N_126645_238';gefs.communityAircraftMap['239']='backend/aircraft/repository/GXD05OQ_166617_239';gefs.communityAircraftMap['240']='backend/aircraft/repository/Boeing 777-300ER_933_240';gefs.communityAircraftMap['241']='backend/aircraft/repository/D01_933_241';gefs.communityAircraftMap['242']='backend/aircraft/repository/D02_933_242';gefs.communityAircraftMap['244']='backend/aircraft/repository/A02_166635_244';gefs.communityAircraftMap['245']='backend/aircraft/repository/FlapsTest_1_245';
  </script>

  <!-- Data -->

  <!-- 3rd party Libs -->
  <script type="text/javascript" src="js/Cesium/1-22/Cesium.js" obfuscation="update" dest="js/Cesium/1-22/Cesium.js"></script>

  <!-- Common libs -->
  <!-- Sim -->
  <script type="text/javascript">gefs.PRODUCTION = true;gefs.killCache = '1467386059';</script>
  <script type="text/javascript" src="js/gefs.js?killcache=1467386059"></script>
  <link rel="stylesheet" type="text/css" href="css/gefs.css" media="screen"/>
  <script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-2996341-8']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
  </script>

  <!-- begin NWS changes -->
  <script src="nws/require.js" data-main="nws/main.js"></script>
  <!-- end NWS changes -->

</head>
<body class="gefs gefs-ingame &lt;?php echo($loginState); ?>" style="overflow: hidden;">
  <div class="gefs-auth">
    <form>
      <a href="index.php?openIdLogin" class="mdl-navigation__link">Logon with Google <i class="material-icons">account_box</i></a>
    </form>
  </div>

  <div class="gefs-account-placeholder"></div><input class="gefs-focus-target"><div class="gefs-ui-left">

      <ul class="gefs-list gefs-toggle-panel gefs-location-list">

  <li class="gefs-list-collapsible-item">Ridge Soaring/Gliding
      <ul>
          <li data-location="gefs.windOverride = true; gefs.preferences.weather.windSpeed = 14; gefs.preferences.weather.windDirection = 277; gefs.flyTo([32.89034750891853,-117.25156658170516,0,-85]);">Torrey Pines Gliderport (Soaring)</a></li>
          <li data-location="gefs.windOverride = true; gefs.preferences.weather.windSpeed = 16; gefs.preferences.weather.windDirection = 277; gefs.flyTo([44.58291179132744,-1.2190110965731453,0,-82]);">Dune du Pyla (Soaring)</a></li>
          <li data-location="gefs.windOverride = false; gefs.flyTo([42.99043614854522,-0.19668640145259153,1400,134, true]);">Argelès-Gazost, Val d'Azun (Paragliding)</a></li>
      </ul>
  </li>

  <!-- Gate -->
  <li class="gefs-list-collapsible-item">At The Gate
      <ul>
          <li data-location="gefs.windOverride = false; gefs.flyTo([33.43710857041375,-111.999915329145,0,90.6]);">Phoenix Skyharbor Airport - Terminal 4 - Gate A6</a></li>
          <li data-location="gefs.windOverride = false; gefs.flyTo([25.79373466921487,-80.28040649955423,0,153]);">Miami International Airport - Gate F5</a></li>
          <li data-location="gefs.windOverride = false; gefs.flyTo([35.5500,139.7908048837465,0,-121.07]);">Tokyo (Haneda) Int'l - Gate 65</a></li>
          <li data-location="gefs.windOverride = false; gefs.flyTo([47.460649437789215,8.552392504958451,0, 6.15]);">Zurich Int'l Airport - Gate E58</a></li>
      </ul>
  </li>

  <li class="gefs-list-collapsible-item">Approaches
      <ul>
          <li data-location="gefs.windOverride = false; gefs.flyTo([36.145,-5.551,800,90, true]);">Gibraltar Int'l</li>
          <li data-location="gefs.windOverride = false; gefs.flyTo([37.807416414832694,-122.6137032378986,309,173.32]);">USS John C. Stennis (Carrier)</li>
          <li data-location="gefs.windOverride = false; gefs.flyTo([24.55734481134812,-81.71068081353695,500,-91.41]);">Key West Int'l.</li>
          <li data-location="gefs.windOverride = false; gefs.flyTo([4.094025150067297,73.53077099503867,301,0.01]);">Malé</li>
          <li data-location="gefs.windOverride = false; gefs.flyTo([35.83654015054112,-82.30353231586423,600,-42.5]);">Mountain Air</li>
          <li data-location="gefs.windOverride = false; gefs.flyTo([45.43225365746484,6.683131212012103,1000,-134]);">Courchevel Altiport</li>
          <li data-location="gefs.windOverride = false; gefs.flyTo([18.034682701324222,-63.15433542979288,350,82]);">Princess Juliana Airport, Saint Maarten</li>
          <li data-location="gefs.windOverride = false; gefs.flyTo([32.73121515773958,-16.735523534674982,317,-134]);">Santa Catarina Airport (Funchal), Madeira</li>
          <li data-location="gefs.windOverride = false; gefs.flyTo([17.904250931639233,-62.85546697796044,150,87]);">Saint Barthélemy Airport</li>
          <li data-location="gefs.windOverride = false; gefs.flyTo([43.71957166711304,7.303216893528995,450,-135.72]);">Aéroport Nice Côte d'Azur</li>
      </ul>
  </li>

  <li class="gefs-list-collapsible-item">On Runway
      <ul>
          <li data-location="gefs.windOverride = false; gefs.flyTo([42.36021520436057,-70.98767662157663,0,-103.54]);">Logan Int'l (Boston) - 27</li>
          <li data-location="gefs.windOverride = false; gefs.flyTo([25.800717256450998,-80.30116643603567,0,87.65]);">Miami Int'l - 8R</li>
          <li data-location="gefs.windOverride = false; gefs.flyTo([43.66555302435758,7.228367855065596,0,-135]);">Aéroport Nice Côte d'Azur - 22L</li>
          <li data-location="gefs.windOverride = false; gefs.flyTo([37.78009384234325,-122.60911495155936,0,172]);">USS John C. Stennis (Carrier)</li>
          <li data-location="gefs.windOverride = false; gefs.flyTo([33.93726741762918,-118.38364975124578,0,-96.50347129433592]);">Los Angeles Int'l, USA - 25L</li>
          <li data-location="gefs.windOverride = false; gefs.flyTo([43.67416610318312,10.384369181910223,0,36.54]);">Pisa - Italy - 04R</li>
          <li data-location="gefs.windOverride = false; gefs.flyTo([53.33191343454627,-2.3107668633750715,0,51.43]);">Manchester Int'l - UK - 05</li>
          <li data-location="gefs.windOverride = false; gefs.flyTo([25.235998236262787,55.394770414276515,0,-61.49]);">Dubai Int'l - UAE - 30L</li>
          <li data-location="gefs.windOverride = false; gefs.flyTo([44.838118548285536,-0.7018235748525906,0,226]);">Bordeaux - France</li>
      </ul>
  </li>

  <li data-location="gefs.windOverride = false; gefs.flyTo([45.938149486108856,6.892803255304612,1500,37.89311560373897]);">Chamonix - Alps - France</li>
  <li data-location="gefs.windOverride = false; gefs.flyTo([37.76577100453262,-122.36941785026704,455,-51.942644559501176]);">San Francisco - USA</li>
  <li data-location="gefs.windOverride = false; gefs.flyTo([36.110353463200575,-113.24040648366983,1288,-140.62100383790101]);">Grand Canyon - USA</li>
  <li data-location="gefs.windOverride = false; gefs.flyTo([-33.84374921548868,151.25052911803596,302,-112.85597028071786]);">Sydney - Australia</li>
  <li data-location="gefs.windOverride = false; gefs.flyTo([-25.365600382613092,131.06309762760762,640,-51.22556535133523]);">Uluru - Australia</li>
  <li data-location="gefs.windOverride = false; gefs.flyTo([37.969320063220124,23.706062632829592,290,95.18337970067272]);">Acropolis - Athens - Greece</li>
  <li data-location="gefs.windOverride = false; gefs.flyTo([27.925300487281817,86.84356489460163,3019,48.38746194814831]);">Mount Everest - Nepal</li>
  <li data-location="gefs.windOverride = false; gefs.flyTo([47.605820095333414,10.716154924389544,1077,153.4510132877216]);">Neuschwanstein Castle - Germany</li>
  <li data-location="gefs.windOverride = false; gefs.flyTo([43.76783434260276,11.37363711588644,863,-95.0858221868535]);">Florence - Tuscany - Italy</li>
  <li data-location="gefs.windOverride = false; gefs.flyTo([32.94077853983021,0.14683667726083313,1200,115.47430369072288]);">Sahara - Algeria</li>
  <li data-location="gefs.windOverride = false; gefs.flyTo([-14.81065560936189,-74.97137062648335,1179,-56.668584418305656]);">Nazca - Peru</li>
  <li  data-location="gefs.windOverride = false; gefs.flyTo([52.34043382703594,4.900905358384406,325,4.323532809932645]);">Amsterdam - Netherlands</li>

  <form class="gefs-locationForm gefs-stopMousePropagation">
      <div class="mdl-textfield mdl-js-textfield" style="width: 100%; padding-right: 86px;">
          <input class="mdl-textfield__input address-input" type="text" id="address">
          <label class="mdl-textfield__label" for="address">Type destination...</label>
      </div>
      <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" type="submit" style="margin-left: -65px;">Go</button>
  </form>

</ul><ul class="gefs-list gefs-toggle-panel gefs-preference-list gefs-preferences"
  data-noblur="true"
  onShow="gefs.initializePreferencesPanel();"
  onHide="gefs.destroyPreferencePanel();">

  <li class="gefs-list-collapsible-item">Controls

      <ul class="gefs-list">
          <!-- Controls -->
          <li class="help-inline no-hover">Select a control device and configure it.</li>

          <li class="no-hover">
              <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect gefs-stopMousePropagation" for="control-keyboard">

                  <input type="radio" id="control-keyboard" class="mdl-radio__button" name="control"
                         update="controls.setMode"
                         gespref="gefs.preferences.controlMode"
                         matchvalue="keyboard"/>
                  <span class="mdl-radio__label gefs-list-collapsible-item">Keyboard [K]

                      <div class="gefs-collapsible">
                      <fieldset>
                          <legend>
                              Settings
                          </legend>

                          <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="keyboardMixYawRoll" title="Mixes the rudder with the ailerons input">
                              <input type="checkbox" id="keyboardMixYawRoll" class="mdl-switch__input" gespref="gefs.preferences.keyboard.mixYawRoll" update="controls.setMode();">
                              <span class="mdl-switch__label">Mix Roll/Yaw</span>
                          </label>

                          <div title="Sets how much rudder is mixed from the ailerons input" class="slider span2"
                               type="slider" gespref="gefs.preferences.keyboard.mixYawRollQuantity"
                               update="controls.setMode();" value="0" min="0.1" max="4" precision="1">
                              <div class="slider-rail">
                                  <div class="slider-selection">
                                      <div class="slider-grippy">
                                          <input class="slider-input"/>
                                      </div>
                                  </div>
                              </div>
                              <label>Roll/Yaw Mix Ratio</label>
                          </div>

                          <div title="Sets how quickly the input responds" class="slider span2" type="slider"
                               gespref="gefs.preferences.keyboard.sensitivity" update="controls.setMode();" value="0"
                               min="0.1" max="4" precision="1">
                              <div class="slider-rail">
                                  <div class="slider-selection">
                                      <div class="slider-grippy">
                                          <input class="slider-input"/>
                                      </div>
                                  </div>
                              </div>
                              <label>Sensitivity</label>
                          </div>

                          <!--
                          <br/>Exponential: <div type="slider" max="2" step="0.1" class="gefs-ui-slider" gespref="gefs.preferences.keyboard.exponential" ></div>
                          -->
                      </fieldset>
                      <fieldset>
                          <legend>
                              Keys
                          </legend>
                          <div class="gefs-keyboard-keys-container">
                              <!-- pouplated by javascript - preferences.js-->
                          </div>
                      </fieldset>
                  </div>

                  </span>
              </label>
          </li>
          <li class="no-hover">
              <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect gefs-stopMousePropagation" for="control-mouse">

                  <input type="radio" id="control-mouse" class="mdl-radio__button" name="control"
                         update="controls.setMode"
                         gespref="gefs.preferences.controlMode"
                         matchvalue="mouse"/>

                  <span class="mdl-radio__label gefs-list-collapsible-item">Mouse [M]

                      <div class="gefs-collapsible">
                          <fieldset>
                              <legend>
                                  Settings
                              </legend>

                              <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="mouseMixYawRoll" title="Mixes the rudder with the ailerons input">
                                  <input type="checkbox" id="mouseMixYawRoll" class="mdl-switch__input" gespref="gefs.preferences.mouse.mixYawRoll" update="controls.setMode();">
                                  <span class="mdl-switch__label">Mix Roll/Yaw</span>
                              </label>

                              <div title="Sets how much rudder is mixed from the ailerons input" class="slider span2"
                                   type="slider" gespref="gefs.preferences.mouse.mixYawRollQuantity"
                                   update="controls.setMode();" value="0" min="0.1" max="4" precision="1">
                                  <div class="slider-rail">
                                      <div class="slider-selection">
                                          <div class="slider-grippy">
                                              <input class="slider-input"/>
                                          </div>
                                      </div>
                                  </div>
                                  <label>Roll/Yaw Mix Ratio</label>
                              </div>

                              <div title="Sets how quickly the input responds" class="slider span2" type="slider"
                                   gespref="gefs.preferences.mouse.sensitivity" update="controls.setMode();" value="0"
                                   min="0.1" max="2" precision="1">
                                  <div class="slider-rail">
                                      <div class="slider-selection">
                                          <div class="slider-grippy">
                                              <input class="slider-input"/>
                                          </div>
                                      </div>
                                  </div>
                                  <label>Sensitivity</label>
                              </div>

                              <div title="For hight value, input will be gentle near the center and fast at the extremes"
                                   class="slider span2" type="slider" gespref="gefs.preferences.mouse.exponential"
                                   update="controls.setMode();" value="0" min="0.1" max="2" precision="1">
                                  <div class="slider-rail">
                                      <div class="slider-selection">
                                          <div class="slider-grippy">
                                              <input class="slider-input"/>
                                          </div>
                                      </div>
                                  </div>
                                  <label>Exponential</label>
                              </div>

                          </fieldset>
                      </div>

                  </span>

              </label>
          </li>
          <li class="no-hover">
              <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect gefs-stopMousePropagation" for="control-joystick">
                  <input type="radio" id="control-joystick" class="mdl-radio__button" name="control"
                         update="controls.setMode"
                         gespref="gefs.preferences.controlMode"
                         matchvalue="joystick"/>
                  <span class="mdl-radio__label gefs-list-collapsible-item">Joystick [J]

                      <div class="gefs-collapsible gefs-preferences-joystick">

                          <fieldset class="gefs-preferences-joystick-status">
                              <legend>
                                  Device Status
                              </legend>
                              <div class="alert alert-error">
                                  <b style="color: red;">Your browser does not appear to support the native GamePad API</b>
                              </div>
                              <div class="alert alert-warning">
                                  <b>Joystick not detected:</b> press a button on the Joystick to enable it.
                              </div>
                              <div class="alert alert-success"></div>
                          </fieldset>

                          <fieldset>
                              <legend>
                                  Settings
                              </legend>

                              <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="joystickMixYawRoll" title="Mixes the rudder with the ailerons input">
                                  <input type="checkbox" id="joystickMixYawRoll" class="mdl-switch__input" gespref="gefs.preferences.joystick.mixYawRoll" update="controls.setMode();">
                                  <span class="mdl-switch__label">Mix Roll/Yaw</span>
                              </label>

                              <div title="Sets how much rudder is mixed from the ailerons input" class="slider span2"
                                   type="slider" gespref="gefs.preferences.joystick.mixYawRollQuantity"
                                   update="controls.setMode();" value="0" min="0.1" max="4" precision="1">
                                  <div class="slider-rail">
                                      <div class="slider-selection">
                                          <div class="slider-grippy">
                                              <input class="slider-input"/>
                                          </div>
                                      </div>
                                  </div>
                                  <label>Roll/Yaw Mix Ratio</label>
                              </div>

                              <div title="Sets how quickly the input responds" class="slider span2" type="slider"
                                   gespref="gefs.preferences.joystick.sensitivity" update="controls.setMode();" value="0"
                                   min="0.1" max="2" precision="1">
                                  <div class="slider-rail">
                                      <div class="slider-selection">
                                          <div class="slider-grippy">
                                              <input class="slider-input"/>
                                          </div>
                                      </div>
                                  </div>
                                  <label>Sensitivity</label>
                              </div>

                              <div title="For hight value, input will be gentle near the center and fast at the extremes"
                                   class="slider span2" type="slider" gespref="gefs.preferences.joystick.exponential"
                                   update="controls.setMode();" value="0" min="0.1" max="2" precision="1">
                                  <div class="slider-rail">
                                      <div class="slider-selection">
                                          <div class="slider-grippy">
                                              <input class="slider-input"/>
                                          </div>
                                      </div>
                                  </div>
                                  <label>Exponential</label>
                              </div>

                          </fieldset>
                          <fieldset>
                              <legend>
                                  Axis
                              </legend>
                              <div class="gefs-preferences-comment">
                                  Move the joystick to check activity
                              </div>
                              <div class="gefs-feedback-wrapper">
                                  <label>Pitch</label>
                                  <select gespref="gefs.preferences.joystick.axis.pitch">
                                      <option value="none">None</option>
                                      <option value="0">Axis 0</option>
                                      <option value="1">Axis 1</option>
                                      <option value="2">Axis 2</option>
                                      <option value="3">Axis 3</option>
                                      <option value="4">Axis 4</option>
                                      <option value="5">Axis 5</option>
                                      <option value="6">Axis 6</option>
                                      <option value="7">Axis 7</option>
                                      <option value="8">Axis 8</option>
                                  </select>
                                  <div class="progress" axis="pitch">
                                      <div class="bar"></div>
                                  </div>
                                  <label class="gefs-reverse-checkbox" title="Reverse axis">
                                      <input type="checkbox" gespref="gefs.preferences.joystick.multiplier.pitch"
                                             update="controls.setMode();"/>
                                      Reverse
                                  </label>
                              </div>
                              <div class="gefs-feedback-wrapper">
                                  <label>Roll</label>
                                  <select gespref="gefs.preferences.joystick.axis.roll">
                                      <option value="none">None</option>
                                      <option value="0">Axis 0</option>
                                      <option value="1">Axis 1</option>
                                      <option value="2">Axis 2</option>
                                      <option value="3">Axis 3</option>
                                      <option value="4">Axis 4</option>
                                      <option value="5">Axis 5</option>
                                      <option value="6">Axis 6</option>
                                      <option value="7">Axis 7</option>
                                      <option value="8">Axis 8</option>
                                  </select>
                                  <div class="progress" axis="roll">
                                      <div class="bar"></div>
                                  </div>
                                  <label class="gefs-reverse-checkbox" title="Reverse axis">
                                      <input type="checkbox" gespref="gefs.preferences.joystick.multiplier.roll"
                                             update="controls.setMode();"/>
                                      Reverse
                                  </label>
                              </div>

                              <div class="gefs-feedback-wrapper">
                                  <label>Yaw</label>
                                  <select gespref="gefs.preferences.joystick.axis.yaw">
                                      <option value="none">None</option>
                                      <option value="0">Axis 0</option>
                                      <option value="1">Axis 1</option>
                                      <option value="2">Axis 2</option>
                                      <option value="3">Axis 3</option>
                                      <option value="4">Axis 4</option>
                                      <option value="5">Axis 5</option>
                                      <option value="6">Axis 6</option>
                                      <option value="7">Axis 7</option>
                                      <option value="8">Axis 8</option>
                                  </select>
                                  <div class="progress" axis="yaw">
                                      <div class="bar"></div>
                                  </div>
                                  <label class="gefs-reverse-checkbox" title="Reverse axis">
                                      <input type="checkbox" gespref="gefs.preferences.joystick.multiplier.yaw"
                                             update="controls.setMode();"/>
                                      Reverse
                                  </label>
                              </div>

                              <div class="gefs-feedback-wrapper">
                                  <label>Throttle</label>
                                  <select gespref="gefs.preferences.joystick.axis.throttle">
                                      <option value="none">None</option>
                                      <option value="0">Axis 0</option>
                                      <option value="1">Axis 1</option>
                                      <option value="2">Axis 2</option>
                                      <option value="3">Axis 3</option>
                                      <option value="4">Axis 4</option>
                                      <option value="5">Axis 5</option>
                                      <option value="6">Axis 6</option>
                                      <option value="7">Axis 7</option>
                                      <option value="8">Axis 8</option>
                                  </select>
                                  <div class="progress" axis="throttle">
                                      <div class="bar"></div>
                                  </div>
                                  <label class="gefs-reverse-checkbox" title="Reverse axis">
                                      <input type="checkbox" gespref="gefs.preferences.joystick.multiplier.throttle"
                                             update="controls.setMode();"/>
                                      Reverse
                                  </label>
                              </div>
                          </fieldset>
                          <fieldset>
                              <legend>
                                  Buttons
                              </legend>
                              <div class="gefs-preferences-comment">
                                  Press joystick buttons to check activity
                              </div>
                              <div class="gefs-joystick-button-container">
                                  <!-- Populated by javascript - preferences.js -->
                              </div>
                          </fieldset>
                      </div>

                  </span>

              </label>
          </li>
          <li class="no-hover gefs-preferences-orientation">
              <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect gefs-stopMousePropagation" for="control-orientation">
                  <input type="radio" id="control-orientation" class="mdl-radio__button" name="control"
                         update="controls.setMode"
                         gespref="gefs.preferences.controlMode"
                         matchvalue="orientation"/>
                  <span class="mdl-radio__label gefs-list-collapsible-item">Mobile Orientation [O]

                      <div class="gefs-collapsible">

                      <div class="gefs-preferences-orientation-status">
                          <div class="alert alert-error">
                              <b style="color: red;">Your device does not appear to support the orientation API</b>
                          </div>
                      </div>

                      <fieldset>
                          <legend>
                              Settings
                          </legend>

                          <label class="checkbox" title="Mixes the rudder with the ailerons input">
                              <input type="checkbox" gespref="gefs.preferences.orientation.mixYawRoll"
                                     update="controls.setMode();"/>
                              Mix Roll/Yaw </label>

                          <div title="Sets how much rudder is mixed from the ailerons input" class="slider span2"
                               type="slider" gespref="gefs.preferences.orientation.mixYawRollQuantity"
                               update="controls.setMode();" value="0" min="0.1" max="4" precision="1">
                              <div class="slider-rail">
                                  <div class="slider-selection">
                                      <div class="slider-grippy">
                                          <input class="slider-input"/>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <label>Roll/Yaw Mix Ratio</label>

                          <div title="Sets how quickly the input responds" class="slider span2" type="slider"
                               gespref="gefs.preferences.orientation.sensitivity" update="controls.setMode();" value="0"
                               min="0.1" max="2" precision="1">
                              <div class="slider-rail">
                                  <div class="slider-selection">
                                      <div class="slider-grippy">
                                          <input class="slider-input"/>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <label>Sensitivity</label>

                          <div title="For hight value, input will be gentle near the center and fast at the extremes"
                               class="slider span2" type="slider" gespref="gefs.preferences.orientation.exponential"
                               update="controls.setMode();" value="0" min="0.1" max="2" precision="1">
                              <div class="slider-rail">
                                  <div class="slider-selection">
                                      <div class="slider-grippy">
                                          <input class="slider-input"/>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <label>Exponential</label>

                      </fieldset>
                      <fieldset>
                          <legend>
                              Axis
                          </legend>
                          <div class="gefs-preferences-comment">
                              <b>Experimental</b>.<br>
                              Move the device to check activity.<br>
                              <b>Tap anywhere in the viewport to re-center the orientation inputs.</b>
                          </div>
                          <div class="gefs-feedback-wrapper">
                              <label>Pitch</label>
                              <select gespref="gefs.preferences.orientation.axis.pitch">
                                  <option value="none">None</option>
                                  <option value="0">Axis 0</option>
                                  <option value="1">Axis 1</option>
                                  <option value="2">Axis 2</option>
                              </select>
                              <div class="progress" axis="pitch">
                                  <div class="bar"></div>
                              </div>
                              <label class="gefs-reverse-checkbox" title="Reverse axis">
                                  <input type="checkbox" gespref="gefs.preferences.orientation.multiplier.pitch"
                                         update="controls.setMode();"/>
                                  Reverse
                              </label>
                          </div>
                          <div class="gefs-feedback-wrapper">
                              <label>Roll</label>
                              <select gespref="gefs.preferences.orientation.axis.roll">
                                  <option value="none">None</option>
                                  <option value="0">Axis 0</option>
                                  <option value="1">Axis 1</option>
                                  <option value="2">Axis 2</option>
                              </select>
                              <div class="progress" axis="roll">
                                  <div class="bar"></div>
                              </div>
                              <label class="gefs-reverse-checkbox" title="Reverse axis">
                                  <input type="checkbox" gespref="gefs.preferences.orientation.multiplier.roll"
                                         update="controls.setMode();"/>
                                  Reverse
                              </label>
                          </div>

                          <div class="gefs-feedback-wrapper">
                              <label>Yaw</label>
                              <select gespref="gefs.preferences.orientation.axis.yaw">
                                  <option value="none">None</option>
                                  <option value="0">Axis 0</option>
                                  <option value="1">Axis 1</option>
                                  <option value="2">Axis 2</option>
                              </select>
                              <div class="progress" axis="yaw">
                                  <div class="bar"></div>
                              </div>
                              <label class="gefs-reverse-checkbox" title="Reverse axis">
                                  <input type="checkbox" gespref="gefs.preferences.orientation.multiplier.yaw"
                                         update="controls.setMode();"/>
                                  Reverse
                              </label>
                          </div>

                      </fieldset>
                  </div>

                  </span>

              </label>
          </li>
      </ul>
  </li>
  <li class="gefs-list-collapsible-item">Simulation

      <div class="gefs-collapsible">
          <!-- Simulation -->
          <fieldset>
              <legend>
                  General
              </legend>
              <label class="checkbox">
                  <input type="checkbox" gespref="gefs.preferences.crashDetection"/>
                  Detect crashes </label>
              <label class="checkbox">                     <input type="checkbox" gespref="gefs.preferences.chat" disabled="true"/>
                  Enable chat
                  <br/>
                  <i>You must be logged in to use the chat</i>  </label>

              <label class="checkbox">
                  <input type="checkbox" gespref="gefs.preferences.multiplayer"
                         update="if (this.checked) {multiplayer.start();} else {multiplayer.stop();};"/>
                  Enable multiplayer </label>
          </fieldset>
          <fieldset>
              <legend>
                  Rendering
              </legend>
              <label> Simple shadows (faster):
                  <input type="checkbox" gespref="gefs.preferences.simpleShadow"
                         update="gefs.useSimpleShadow(this.checked);"/>
              </label>
              <label> Low quality rendering:
                  <input type="checkbox" gespref="gefs.preferences.lowres"
                         update="gefs.api.lowResolution(this.checked);"/>
              </label>
          </fieldset>
          <fieldset>
              <legend>
                  Linking
              </legend>
              Generate a link to the current flight (location and aircraft)
              <button class="btn" onclick="gefs.getLink();" title="Get a URL to the current flight and location">
                  Get link
              </button>
              <div class="gefs-linkOutput"></div>
          </fieldset>
          <fieldset>
              <legend>
                  Multi-monitor (Experimental)
              </legend>
              <button class="btn" onclick="camera.openSlaveWindow(-1);" title="Extend screen to the left">
                  Open left screen
              </button>
              <button class="btn" onclick="camera.openSlaveWindow(1);" title="Extend screen to the right">
                  Open right screen
              </button>
          </fieldset>
      </div>

  </li>
  <li class="gefs-list-collapsible-item">Weather

      <div class="gefs-collapsible">
          <!-- Weather -->
          <fieldset>
              <legend>
                  Time of the day
              </legend>
              <label> Enable time of day illumination:
                  <input type="checkbox" gespref="gefs.preferences.weather.sun" update="weather.sun(this.checked);"/>
              </label>
              <div title="Set time of day" class="slider span2" type="slider"
                   gespref="gefs.preferences.weather.timeofday" update="(gefs.setTimeOfDay)" value="12" min="0"
                   max="24" precision="0.5">
                  <div class="slider-rail">
                      <div class="slider-selection">
                          <div class="slider-grippy">
                              <input class="slider-input"/>
                          </div>
                      </div>
                  </div>
              </div>
              <label>Time of Day (UTC) in hours</label>
          </fieldset>
          <!--
          <fieldset>
              <legend>
                  Clouds
              </legend>
              <label>show clouds:
                  <input type="checkbox" gespref="gefs.preferences.weather.clouds" update="weather.refresh();"/>
              </label>
          </fieldset>
          -->
          <fieldset>
              <legend>
                  Wind
              </legend>
              <label>Wind blows:
                  <input type="checkbox" gespref="gefs.preferences.weather.windActive" update="weather.refresh();"/>
              </label>
              <fieldset style="clear: left;">
                  <legend>
                      Customize:
                  </legend>
                  <label>Custom wind override:
                      <input type="checkbox" gespref="gefs.preferences.weather.customWindActive"
                             update="weather.refresh();"/>
                  </label>

                  <div>
                      Speed (kts):
                      <div title="" class="slider span2" type="slider" gespref="gefs.preferences.weather.windSpeed"
                           value="0" min="0" max="60" precision="0"
                           update="if (gefs.preferences.weather.customWindActive) {weather.refresh();}">
                          <div class="slider-rail">
                              <div class="slider-selection">
                                  <div class="slider-grippy">
                                      <input class="slider-input"/>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>

                  <div>
                      Direction (degrees):
                      <div title="" class="slider span2" type="slider"
                           gespref="gefs.preferences.weather.windDirection" value="0" min="0" max="360" precision="0"
                           update="if (gefs.preferences.weather.customWindActive) {weather.refresh();}">
                          <div class="slider-rail">
                              <div class="slider-selection">
                                  <div class="slider-grippy">
                                      <input class="slider-input"/>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>

              </fieldset>
              <label>Wind gusts and direction change:
                  <input type="checkbox" gespref="gefs.preferences.weather.randomizeWind"/>
              </label>
          </fieldset>
      </div>

  </li>
  <li class="gefs-list-collapsible-item">Help

      <div class="gefs-collapsible">
          <iframe src="html/static/about-frame.php" frameborder="no" class="gefs-preference-scrollarea"></iframe>
      </div>

  </li>
  <li class="gefs-list-collapsible-item">Credits

      <div class="gefs-collapsible">
          <iframe src="html/static/credits-frame.php" frameborder="no" class="gefs-preference-scrollarea"></iframe>
      </div>

  </li>
  <li class="gefs-list-collapsible-item">Debug info

      <div class="gefs-collapsible gefs-tab-debug">
          <textarea class="gefs-debug-info"></textarea>
      </div>

  </li>

  <!-- Bottom buttons -->
  <div class="gefs-preferenceForm">
      <div style="float: left;">
          <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" onclick="gefs.resetPreferences();">Reset</button>
      </div>
      <div style="float: right;">
          <button class="mdl-button mdl-js-button" onclick="gefs.cancelPreferencesPanel();">Cancel</button>
          <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent" onclick="gefs.savePreferencesPanel();">Save</button>
      </div>
  </div>
</ul><ul class="gefs-list gefs-toggle-panel gefs-aircraft-list">

  <li class="gefs-list-collapsible-item">Community contributed</a><ul><li data-aircraft="235">Boeing 787-8 (by GX Development)</li><li data-aircraft="236">Embraer E190 (by GX Development)</li><li data-aircraft="237">Boeing 767-300ER (by GX Development)</li><li data-aircraft="238">Boeing 757-200 (by GX Development)</li><li data-aircraft="239">Airbus A350-900 (by GX Development)</li><li data-aircraft="240">Boeing 777-300ER (by FLDG)</li><li data-aircraft="241">Boeing 737-700 (by FLDG)</li><li data-aircraft="242">Airbus A320neo (by FLDG)</li><li data-aircraft="244">Airbus A330-200 (by FLDG)</li></ul></li>    <!--<li><a href="#" data-aircraft="sopwith');">Sopwith Camel F.1</a></li>-->
  <li data-aircraft="cub">Piper J-3 Cub</li>
  <li data-aircraft="sportstar">Evektor Sportstar</li>
  <li data-aircraft="alphajet">Dassault-Dornier Alpha Jet</li>
  <li data-aircraft="dc3">Douglas DC-3</li>
  <li data-aircraft="hughes">Hughes 269a/TH-55 Osage</li>
  <li data-aircraft="tom">Major Tom (hot air balloon)</li>
  <li data-aircraft="md11">McDonnell Douglas MD-11</li>
  <li data-aircraft="su35">SU-35</li>
  <li data-aircraft="a380">Airbus A380</li>
  <li data-aircraft="concorde">Concorde</li>
  <li data-aircraft="zlin">Zlin Z-50</li>
  <li data-aircraft="cessna">Cessna 152</li>
  <li data-aircraft="goat">Goat Airchair</li>
  <li data-aircraft="para">Paraglider</li>
  <li data-aircraft="jantar">szd-48-3 Jantar</li>
  <li data-aircraft="AN140">Antonov An-140</li>
</ul><!-- Navigation panel --><div class="gefs-map-list gefs-toggle-panel" onshow="ui.createMap();" onhide="ui.stopMap();" data-noblur="true">
          <a class="gefs-expand-horiz btn btn-mini"><i class="icon-chevron-right"></i></a>
          <div class="gefs-map-viewport gefs-stopMousePropagation"></div>
          <div class="gefs-autopilot gefs-stopKeyboardPropagation gefs-stopMousePropagation">
              <h6>Autopilot</h6>
              <button class="mdl-button mdl-js-button mdl-button--raised gefs-autopilot-toggle" onclick="controls.autopilot.toggle();" title="Toggle autopilot on/off - [A]">Disengaged</button>
              <div class="gefs-autopilot-displays">
                  <label>
                      Altitude
                      <input type="number" placeholder="00000" min="0" step="1000" class="gefs-autopilot-altitude" onchange="controls.autopilot.setAltitude(this.value);"><span>Ft.</span>
                  </label>
                  <label>
                      Heading
                      <input type="number" placeholder="000" min="0" max="359" step="1" class="gefs-autopilot-heading" onchange="controls.autopilot.setHeading(this.value);"><span>Deg.</span>
                  </label>
                  <label>
                      Speed
                      <input type="number" placeholder="0" min="0" step="10" class="gefs-autopilot-kias" onchange="controls.autopilot.setKias(this.value);"><span>Kts.</span>
                  </label>
              </div>
          </div>
      </div>

      <!-- Debug panel -->
      <div class="gefs-debug">
          <div class="gefs-debugFrame">
              <label>Part name<input type="text" class="debugPointName"></label>
              <label>Collision point index<input title="collision point index" style="width: 20px;" class="debugCollisionPointIndex"></label>
              <label class="checkbox">Force Source Point<input type="checkbox" class="debugShowForceSource" title="force source point"></label>
              <label class="checkbox">Force Direction<input type="checkbox" class="debugShowForceDirection" title="Force direction"></label>
              <label class="checkbox">Local Position<input type="checkbox" class="debugShowLocalPosition" title="Local position"></label>
              <button class="btn btn-warning" onclick="gefs.killCache = '?killcache=' + new Date().getTime(); gefs.debugResetAircraft = true;">Clear cache</button>
              <button class="btn" onclick="gefs.aircraft.change(gefs.aircraft.name, /* justReload */ gefs.debugResetAircraft);">Reload aircraft</button>
              <div class="gefs-debugWatch"></div>
              <div class="gefs-debugLog"></div>
          </div>
      </div>
  </div>

  <div class="gefs-ui-right gefs-mouse-controller-area">

      <!-- Top UI overlay -->
      <div class="gefs-ui-top">

  <div class="gefs-auth">
      <form>
      <a href="index.php?openIdLogin" class="mdl-navigation__link">Logon with Google <i class="material-icons">account_box</i></a>
  </form>

    </div>

  <script type="text/javascript">
    window.gefs = window.gefs || {};

    gefs.multiplayerHost = 'http://net.gefs-online.com:8080';

    gefs.userAccount = {
      'id': '',
      'sessionId': 'q1isi9q0pj90kuhi20t2plk2n3',
      'muteArray': []
    };

    gefs.userAccount.muteList = {};
    for (i = 0, l = gefs.userAccount.muteArray.length; i < l; i++) {
      gefs.userAccount.muteList[gefs.userAccount.muteArray[i]] = 1;
    }

        </script><div class="gefs-player-count"></div>

          <div class="setup-section" id="googleAds"><script async="" src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script><ins class="adsbygoogle" style="display:inline-block;width:468px;height:15px" data-ad-client="ca-pub-1808592532341984" data-ad-slot="1820948244"></ins><script>(adsbygoogle = window.adsbygoogle || []).push({});</script></div>
      </div>

      <div class="gefs-chat-section gefs-authenticated">
          <div class="gefs-chat-messages"></div>
      </div>

      <!-- Touch control pads -->
      <div class="gefs-control-pad"></div>
      <div class="gefs-throttle-pad">
          <div class="gefs-throttle-cursor"></div>
      </div>

      <!-- Canvas placeholder -->
      <div id="gefs-ui-3dview" class="gefs-ui-3dview"></div>
  </div>

  <!-- Bottom bar -->
  <div class="gefs-ui-bottom">

      <button class="mdl-button mdl-js-button gefs-f-standard-ui" data-panel=".gefs-aircraft-list">Aircraft</button>
      <button class="mdl-button mdl-js-button mdl-button--colored gefs-authenticated gefs-editor-role gefs-f-standard-ui" onclick="gefs.debug.toggleDebug();">Debug</button>
      <button class="mdl-button mdl-js-button gefs-f-standard-ui" data-panel=".gefs-location-list">Location</button>

      <!--
          *
          *
          * Camera selector
          *
          *
      -->
      <button id="gefs-camera-selector" class="mdl-button mdl-js-button">Camera</button>

      <ul class="mdl-menu mdl-menu--top-left mdl-js-menu mdl-js-ripple-effect" for="gefs-camera-selector"><li class="gefs-extra-views mdl-menu__item mdl-menu__item--full-bleed-divider">Extra views
              <ul class="mdl-menu gefs-extra-views-holder"><!-- to be filled from aircraft definition --></ul></li>
          <li class="mdl-menu__item" data-camera="camera.set(0);">Follow cam</li>
          <li class="mdl-menu__item" data-camera="camera.set(1);">Cockpit cam</li>
          <li class="mdl-menu__item" data-camera="camera.set(2);">Cockpit-less cam</li>
          <li class="mdl-menu__item" data-camera="camera.set(3);">Chase cam</li>
          <li class="mdl-menu__item" data-camera="camera.set(4);">Free cam</li>
      </ul><!-- Options and map --><div class="gefs-ui-bottom-separator gefs-f-standard-ui"></div>
      <button class="mdl-button mdl-js-button gefs-f-standard-ui" data-panel=".gefs-preference-list" title="Open the settings/options panel [O]">Options <i class="material-icons">settings</i></button>
      <button class="mdl-button mdl-js-button gefs-f-standard-ui" data-panel=".gefs-map-list" title="Open the navigation panel [N]">Nav <i class="material-icons">public</i></button>

      <!-- Pause, mute, reset, playback -->
      <div class="gefs-ui-bottom-box gefs-f-standard-ui">
          <button class="gefs-button-pause mdl-button mdl-js-button mdl-button--icon" onclick="gefs.togglePause();" title="Pause/Unpause the simulation [P]"><i class="material-icons">pause_circle_outline</i></button>
          <button class="gefs-button-mute mdl-button mdl-js-button mdl-button--icon" onclick="audio.toggleMute();" title="Mute/Unmute sound [S]"><i class="material-icons">volume_off</i></button>
          <button class="mdl-button mdl-js-button mdl-button--icon" onclick="gefs.resetFlight();" title="Reset the flight [R]"><i class="material-icons">autorenew</i></button>
          <button class="mdl-button mdl-js-button mdl-button--icon" onclick="flight.recorder.enterPlayback();" title="Watch recorded flight"><i class="material-icons">play_circle_outline</i></button>
      </div>

      <!-- Chat -->
      <div class="gefs-chat-input-section gefs-authenticated gefs-f-standard-ui">
          <button class="gefs-chat-button mdl-button mdl-js-button" title="Type a chat message [T]">Talk <i class="icon-align-left"></i></button>
          <form class="gefs-chat-form">
              <div class="mdl-textfield mdl-js-textfield">
                  <input class="mdl-textfield__input gefs-chat-input gefs-stopKeyboardPropagation gefs-stopMousePropagation" size="30" maxlength="140" type="text" id="chatInput"><label class="mdl-textfield__label" for="chatInput">Message...</label>
              </div>
              <button class="gefs-chat-send-button mdl-button mdl-js-button mdl-button--colored" type="submit">Send</button>
          </form>
      </div>
      <!--
          *
          *
          * Record player
          *
          *
      -->
      <div class="gefs-f-recordPlayer">

          <button class="mdl-button mdl-js-button" onclick="flight.recorder.exitPlayback();" title="Exit record player">Exit player</button>

          <!-- Player controls -->
          <div class="gefs-ui-bottom-box">
              <button class="mdl-button mdl-js-button mdl-button--icon" onclick="flight.recorder.setStep(0);" title="Begining"><i class="material-icons">fast_rewind</i></button>
              <button class="mdl-button mdl-js-button mdl-button--icon" onclick="flight.recorder.startPlayback();" title="Start playback"><i class="material-icons">play_arrow</i></button>
              <button class="gefs-button-pause mdl-button mdl-js-button mdl-button--icon" onclick="gefs.togglePause();" title="Pause/Unpause playback [P]"><i class="material-icons">pause_circle_outline</i></button>
              <button class="mdl-button mdl-js-button mdl-button--icon" onclick="flight.recorder.setStep(100000);" title="End"><i class="material-icons">fast_forward</i></button>
          </div>

      </div>

      <!-- player's slider -->
      <div class="gefs-f-recordPlayer gefs-slider-container">
          <div class="slider gefs-recordPlayer-slider" type="slider" value="0" min="0" precision="0" style="height: 10px;">
              <div class="slider-rail">
                  <div class="slider-selection">
                      <div class="slider-grippy"><input class="slider-input"></div>
                  </div>
              </div>
          </div>
      </div>
  </div>

<div class="alert alert-warning gefs-preferences-alert" alert-dismissible role="alert" style="display: none; float: left; margin: 2px;">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
	<b>Because of a recent change</b>, preferences are reset to default. Sorry.
</div>

  <div class="mdl-dialog gefs-user-block">

      <div class="gefs-chat-user-popup">
          Pilot: <b class="gefs-user-callsign"></b>
          <button class="gefs-cancel btn">Cancel</button>
          <button class="gefs-ignore-user btn btn-inverse"><i class="icon-ban-circle icon-white"></i> Block</button>

      </div>

      <h4 class="mdl-dialog__title">Pilot <b class="gefs-user-callsign"></b></h4>
      <div class="mdl-dialog__content">
          <p>
              Would you like to stop receiving messages from user <b class="gefs-user-callsign"></b>?
          </p>
          </div>
      <div class="mdl-dialog__actions">
          <button class="gefs-ignore-user mdl-button mdl-button--raised mdl-button--colored">Block user</button>
          <button class="mdl-button close gefs-cancel">Cancel</button>
      </div>
  </div>
</body></html>
