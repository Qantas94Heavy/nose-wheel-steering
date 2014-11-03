// ==UserScript==
// @name GEFS-Online Steering Addon (seperate rudder/nosewheel steering)
// @description This extension (by Qantas 94 Heavy) allows rudder to be used without steering the nosewheel significantly.
// @namespace GEFS-Plugins
// @match http://www.gefs-online.com/gefs.php*
// @match http://gefs-online.com/gefs.php*
// @run-at document-end
// @version 0.2.0
// @grant none
// ==/UserScript==

'use strict';

require(['events/keydown', 'events/keyup', 'nosewheelsteering'], function (keyDown, keyUp, noseWheelSteering) {
  $(document).keydown(keyDown).keyup(keyUp);
      
  /* global Aircraft */
  var load = Aircraft.prototype.load;
  Aircraft.prototype.load = function (aircraftName) {
    // allow us to keep track of whether the function has loaded new aircraft yet (async) 
    var oldkmlObjects = ges.aircraft.kmlObjects;

    // call original aircraft load function
    load.apply(this, arguments);

    var timer = setInterval(function () {
      // kmlObjects has been replaced, i.e. ges.aircraft.load has completed
      if (ges.aircraft.kmlObjects !== oldkmlObjects) {
        noseWheelSteering(aircraftName);
        clearInterval(timer);
      }
    }, 16);
  };
});
