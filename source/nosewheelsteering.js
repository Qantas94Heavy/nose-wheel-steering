'use strict';

define(function () {
  function noseWheelSteering(aircraftName) {
    var ratio;
    function set(noseWheel, tillerNoseAngle, rudderNoseAngle, lockoutSpeed) {
      return function () {
        var anim = ges.aircraft.wheels[noseWheel].animations[0];
        anim.value = 'steeringAngle';
        anim.ratio = tillerNoseAngle;
        ratio = rudderNoseAngle / tillerNoseAngle;
      };
    }
    var aircrafts = {
      a380: set(4, 75, 7),
      md11: set(3, 70, 10),
      cessna: set(2, 30, 8.5),
      AN140: set(2, 45, 5),
      concorde: set(2, 60, 10),
      su35: set(4, 45, 5),
      dc3: set(0, -45, -3),
      alphajet: set(2, 35, 5),
      zlin: set(2, -30, -2),
      sportstar: set(2, 15, 0),
      // Boeing 777-300ER
      67: set(2, 70, 7)
    };

    (aircrafts[aircraftName] || function () {
      ratio = 1;
    })();
    controls.nwAngle = 0;
    controls.updateKeyboardGeneral = function (dt) {
      var throttleIncrement = controls.keyboard.throttleIncrement * dt;
      if (controls.states.increaseThrottle) controls.throttle += throttleIncrement;
      else if (controls.states.decreaseThrottle) controls.throttle -= throttleIncrement;
      
      var sensitivity = ges.preferences.keyboard.sensitivity * ges.aircraft.controllers.yaw.sensitivity;
      var yawIncrement = controls.keyboard.yawIncrement * dt * sensitivity * ges.aircraft.controllers.yaw.ratio;
      
      var notSteering = false;
      if (controls.states.steerLeft) controls.nwAngle = clamp(controls.nwAngle - yawIncrement, -1, 1);
      else if (controls.states.steerRight) controls.nwAngle = clamp(controls.nwAngle + yawIncrement, -1, 1);
      else notSteering = true;
      
      if (controls.states.rudderLeft) {
        controls.yaw -= yawIncrement;
        
        if (notSteering) {
          // let nose wheel recentre if nose position beyond max rudder steering
          if (Math.abs(controls.nwAngle) < ratio)
            controls.nwAngle = clamp(controls.nwAngle - yawIncrement * ratio, -ratio, ratio);
          else
            controls.nwAngle -= controls.nwAngle * controls.keyboard.recenterRatio * sensitivity;
        }
      } else if (controls.states.rudderRight) {
        controls.yaw += yawIncrement;
        
        if (notSteering) {
          // let nose wheel recentre if nose position beyond max rudder steering
          if (Math.abs(controls.nwAngle) < ratio)
            controls.nwAngle = clamp(controls.nwAngle + yawIncrement * ratio, -ratio, ratio);
          else
            controls.nwAngle -= controls.nwAngle * controls.keyboard.recenterRatio * sensitivity;
        }
      } else if (ges.aircraft.controllers.yaw.recenter) {
        controls.yaw -= controls.yaw * controls.keyboard.recenterRatio * sensitivity;
        if (notSteering)
          controls.nwAngle -= controls.nwAngle * controls.keyboard.recenterRatio * sensitivity;  // recentre nosewheel if no other nosewheel input
      }
      ges.aircraft.animationValue.steeringAngle = controls.nwAngle;
    };
  }

  return noseWheelSteering;
});