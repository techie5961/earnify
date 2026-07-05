@extends('layout.users.app')
@section('title')
    Cube Game
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('games/cube/style.css?v=1.1') }}" class="css">
   <style>
    header,footer{
      display:none;
    }
    main{
      margin-left:0;
      margin-right:0;
      width:100%;
      max-width:100%;
      
    }
    /* Modal Styles */
    .ui__modal {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: 100;
      display: flex;
      align-items: center;
      justify-content: center;
      pointer-events: none;
      opacity: 0;
      transition: opacity 400ms ease;
    }
    .ui__modal.active {
      pointer-events: all;
      opacity: 1;
    }
    .modal-overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.6);
      backdrop-filter: blur(8px);
      -webkit-backdrop-filter: blur(8px);
    }
    .modal-container {
      position: relative;
      background: #1a1f2e;
      border-radius: 1.2em;
      max-width: 28em;
      width: 90%;
      padding: 0;
      box-shadow: 0 2em 4em rgba(0, 0, 0, 0.5);
      transform: scale(0.9) translateY(2em);
      transition: transform 400ms cubic-bezier(0.34, 1.56, 0.64, 1);
      font-family: "BungeeFont", sans-serif;
      color: #e8eaed;
      border: 1px solid rgba(255, 255, 255, 0.08);
    }
    .ui__modal.active .modal-container {
      transform: scale(1) translateY(0);
    }
    .modal-header {
      padding: 1.2em 1.5em 0.8em;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 1px solid rgba(255, 255, 255, 0.06);
    }
    .modal-title {
      font-size: 1.1em;
      font-weight: normal;
      letter-spacing: 0.05em;
      margin: 0;
      color: #ffffff;
    }
    .modal-close {
      background: none;
      border: none;
      color: rgba(255, 255, 255, 0.4);
      font-size: 1.8em;
      line-height: 1;
      cursor: pointer;
      padding: 0 0.2em;
      transition: color 200ms ease;
    }
    .modal-close:hover {
      color: #ffffff;
    }
    .modal-body {
      padding: 1.5em;
      font-size: 0.85em;
      line-height: 1.6;
      color: #c8cbd4;
    }
    .modal-body p {
      margin: 0 0 0.6em 0;
    }
    .modal-body p:last-child {
      margin-bottom: 0;
    }
    .modal-body .highlight {
      color: #41aac8;
      font-weight: bold;
    }
    .modal-body .text-danger {
      color: #ef3923;
    }
    .modal-body .text-success {
      color: #82ca38;
    }
    .modal-footer {
      padding: 1em 1.5em 1.5em;
      display: flex;
      gap: 0.8em;
      justify-content: flex-end;
      border-top: 1px solid rgba(255, 255, 255, 0.06);
    }
    .modal-btn {
      padding: 0.6em 1.5em;
      border: none;
      border-radius: 0.5em;
      font-family: "BungeeFont", sans-serif;
      font-size: 0.75em;
      letter-spacing: 0.04em;
      cursor: pointer;
      transition: all 200ms ease;
      text-transform: uppercase;
    }
    .modal-btn-primary {
      background: #41aac8;
      color: #ffffff;
    }
    .modal-btn-primary:hover {
      background: #52bbd9;
      transform: scale(1.02);
    }
    .modal-btn-secondary {
      background: rgba(255, 255, 255, 0.08);
      color: #a0a4b0;
    }
    .modal-btn-secondary:hover {
      background: rgba(255, 255, 255, 0.15);
      color: #ffffff;
    }
    .modal-btn-success {
      background: #82ca38;
      color: #ffffff;
    }
    .modal-btn-success:hover {
      background: #92da48;
      transform: scale(1.02);
    }
    .modal-btn-danger {
      background: #ef3923;
      color: #ffffff;
    }
    .modal-btn-danger:hover {
      background: #ff4933;
      transform: scale(1.02);
    }
    .modal-container.type-success .modal-btn-primary {
      background: #82ca38;
    }
    .modal-container.type-warning .modal-btn-primary {
      background: #ff8c0a;
    }
    .modal-container.type-danger .modal-btn-primary {
      background: #ef3923;
    }
    .modal-container.type-success .modal-title {
      color: #82ca38;
    }
    .modal-container.type-danger .modal-title {
      color: #ef3923;
    }

    /* ===== CUSTOM TIMER ===== */
    .custom-timer {
      position: absolute;
      top: 1.5em;
      left: 50%;
      transform: translateX(-50%);
      z-index: 10;
      font-family: "BungeeFont", sans-serif;
      font-size: 1.8em;
      color: #41aac8;
      background: rgba(0, 0, 0, 0.5);
      backdrop-filter: blur(4px);
      -webkit-backdrop-filter: blur(4px);
      padding: 0.3em 1.2em;
      border-radius: 0.5em;
      border: 1px solid rgba(255, 255, 255, 0.1);
      opacity: 0;
      pointer-events: none;
      transition: opacity 400ms ease, transform 400ms ease;
      transform: translateX(-50%) translateY(-1em);
      text-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
    }
    .custom-timer.visible {
      opacity: 1;
      pointer-events: all;
      transform: translateX(-50%) translateY(0);
    }
    .custom-timer .timer-label {
      font-size: 0.4em;
      letter-spacing: 0.1em;
      color: rgba(255, 255, 255, 0.5);
      margin-right: 0.5em;
    }
    .custom-timer .timer-value {
      font-size: 1em;
      letter-spacing: 0.05em;
    }
    .custom-timer .timer-value.warning {
      color: #ff8c0a;
    }
    .custom-timer .timer-value.danger {
      color: #ef3923;
      animation: timerPulse 0.5s ease-in-out infinite alternate;
    }
    .custom-timer .timer-value.paused {
      color: #666;
    }
    
    @keyframes timerPulse {
      0% { opacity: 1; transform: scale(1); }
      100% { opacity: 0.5; transform: scale(0.95); }
    }
    
    /* Timer progress bar */
    .custom-timer .timer-bar {
      position: absolute;
      bottom: -2px;
      left: 0;
      height: 3px;
      background: #41aac8;
      border-radius: 0 0 0.5em 0.5em;
      transition: width 100ms linear;
      width: 100%;
    }
    .custom-timer .timer-bar.warning {
      background: #ff8c0a;
    }
    .custom-timer .timer-bar.danger {
      background: #ef3923;
    }
    
    @media (max-width: 600px) {
      .custom-timer {
        font-size: 1.2em;
        padding: 0.2em 0.8em;
        top: 0.8em;
      }
      .custom-timer .timer-label {
        font-size: 0.35em;
      }
    }
  </style>
@endsection
@section('main')
 <div class="ui">

    <div class="ui__background"></div>

    <div class="ui__game"></div>

    <!-- ===== CUSTOM TIMER ===== -->
    <div class="custom-timer" id="customTimer">
      <span class="timer-label">TIME REMAINING</span>
      <span class="timer-value" id="timerDisplay">30:00</span>
      <div class="timer-bar" id="timerBar"></div>
    </div>

    <div class="ui__texts">
      <h1 class="text text--title">
        <span>THE</span>
        <span>CUBE</span>
      </h1>
      <div style="color:black;" class="text text--note">
        Double tap to start
      </div>
      <div class="text text--timer" id="gameTimer">
        30:00
      </div>
      <div class="text text--complete">
        <span>Complete!</span>
      </div>
      <div class="text text--best-time">
        <icon trophy></icon>
        <span>Best Time!</span>
      </div>
    </div>

    <div class="ui__prefs">
      <range name="size" title="Cube Size" list="2,3,4,5"></range>
      <range name="flip" title="Flip Type" list="Swift&nbsp;,Smooth,Bounce"></range>
      <range name="scramble" title="Scramble Length" list="20,25,30"></range>
      <range name="fov" title="Camera Angle" list="Ortographic,Perspective"></range>
      <range name="theme" title="Color Scheme" list="Cube,Erno,Dust,Camo,Rain"></range>
    </div>

    <div class="ui__theme">
      <range name="hue" title="Hue" color></range>
      <range name="saturation" title="Saturation" color></range>
      <range name="lightness" title="Lightness" color></range>
    </div>

    <div class="ui__stats">
      <div class="stats" name="cube-size">
        <i>Cube:</i><b>3x3x3</b>
      </div>
      <div class="stats" name="total-solves">
        <i>Total solves:</i><b>-</b>
      </div>
      <div class="stats" name="best-time">
        <i>Best time:</i><b>-</b>
      </div>
      <div class="stats" name="worst-time">
        <i>Worst time:</i><b>-</b>
      </div>
      <div class="stats" name="average-5">
        <i>Average of 5:</i><b>-</b>
      </div>
      <div class="stats" name="average-12">
        <i>Average of 12:</i><b>-</b>
      </div>
      <div class="stats" name="average-25">
        <i>Average of 25:</i><b>-</b>
      </div>
    </div>

    <div class="ui__buttons">
      <button class="btn btn--bl btn--stats">
        <icon trophy></icon>
      </button>
      <button class="btn btn--br btn--prefs">
        <icon settings></icon>
      </button>
      <button class="btn btn--bl btn--back">
        <icon back></icon>
      </button>
      <button class="btn btn--br btn--theme">
        <icon theme></icon>
      </button>
      <button class="btn btn--br btn--reset">
        <icon reset></icon>
      </button>
    </div>

    <!-- ===== MODAL ===== -->
    <div class="ui__modal" id="notificationModal">
      <div class="modal-overlay"></div>
      <div class="modal-container">
        <div class="modal-header">
          <h2 class="modal-title">Notification</h2>
          <button class="modal-close" id="modalClose">&times;</button>
        </div>
        <div class="modal-body" id="modalBody">
          <p>Welcome to The Cube!</p>
        </div>
        <div class="modal-footer">
          <button class="modal-btn modal-btn-primary" id="modalConfirm">Got it!</button>
          <button class="modal-btn modal-btn-secondary" id="modalDismiss">Dismiss</button>
        </div>
      </div>
    </div>
    <!-- ===== END MODAL ===== -->

  </div>

@endsection
@section('js')
    <script src="{{ asset('vitecss/js/three.min.js') }}" class="js"></script>
    <script src="{{ asset('games/cube/script.js') }}" class="js"></script>

    <script class="js">
    // ============================================
    // COUNTDOWN TIMER SYSTEM - DEVELOPER CONTROLLED
    // ============================================
    
    (function() {
      'use strict';
      
      // ============================================
      // CONFIG - UPDATE FROM CODE ONLY
      // ============================================
      var CONFIG = {
        defaultTime: 1800, // 30 minutes in seconds
        warningThreshold: 60, // 1 minute
        dangerThreshold: 30, // 30 seconds
        maxTime: 3600 // 1 hour max
      };
      
      // Timer state
      var timerState = {
        timeRemaining: CONFIG.defaultTime,
        maxTime: CONFIG.defaultTime,
        isRunning: false,
        isPaused: true,
        isFinished: false,
        intervalId: null,
        onComplete: null,
        onTick: null,
        onWin: null,
        onLose: null
      };
      
      // DOM elements
      var timerElement = document.getElementById('gameTimer');
      var customTimer = document.getElementById('customTimer');
      var timerDisplay = document.getElementById('timerDisplay');
      var timerBar = document.getElementById('timerBar');
      var noteElement = document.querySelector('.text--note');
      var titleElement = document.querySelector('.text--title');
      
      // ============================================
      // TIMER CONTROLLER - DEVELOPER API
      // ============================================
      
      var CountdownTimer = {
        // ===== DEVELOPER CONFIG METHODS =====
        setDefaultTime: function(seconds) {
          if (seconds > CONFIG.maxTime) seconds = CONFIG.maxTime;
          if (seconds < 1) seconds = 1;
          CONFIG.defaultTime = seconds;
          timerState.maxTime = seconds;
          timerState.timeRemaining = seconds;
          this.updateDisplay();
          this.setPausedState(true);
          this.hideTimer();
          console.log('[Timer] Default time set to: ' + seconds + 's (' + this.formatTime(seconds) + ')');
          return this;
        },
        
        setWarningThreshold: function(seconds) {
          CONFIG.warningThreshold = seconds;
          console.log('[Timer] Warning threshold set to: ' + seconds + 's');
          return this;
        },
        
        setDangerThreshold: function(seconds) {
          CONFIG.dangerThreshold = seconds;
          console.log('[Timer] Danger threshold set to: ' + seconds + 's');
          return this;
        },
        
        setMaxTime: function(seconds) {
          CONFIG.maxTime = seconds;
          console.log('[Timer] Max time set to: ' + seconds + 's');
          return this;
        },
        
        // ===== TIMER CONTROL METHODS =====
        init: function(options) {
          if (options) {
            if (options.defaultTime) this.setDefaultTime(options.defaultTime);
            if (options.warningThreshold) this.setWarningThreshold(options.warningThreshold);
            if (options.dangerThreshold) this.setDangerThreshold(options.dangerThreshold);
            if (options.maxTime) this.setMaxTime(options.maxTime);
          }
          
          timerState.timeRemaining = CONFIG.defaultTime;
          timerState.maxTime = CONFIG.defaultTime;
          timerState.isRunning = false;
          timerState.isPaused = true;
          timerState.isFinished = false;
          
          this.updateDisplay();
          this.setPausedState(true);
          this.hideTimer();
          
          console.log('[Timer] Initialized with ' + CONFIG.defaultTime + 's (' + this.formatTime(CONFIG.defaultTime) + ')');
          return this;
        },
        
        start: function(onComplete, onTick, onWin, onLose) {
          if (timerState.isRunning) {
            console.warn('[Timer] Already running');
            return this;
          }
          if (timerState.isFinished) {
            this.reset();
          }
          
          timerState.onComplete = onComplete || null;
          timerState.onTick = onTick || null;
          timerState.onWin = onWin || null;
          timerState.onLose = onLose || null;
          
          timerState.isRunning = true;
          timerState.isPaused = false;
          timerState.isFinished = false;
          
          this.showTimer();
          
          if (timerState.intervalId) {
            clearInterval(timerState.intervalId);
          }
          
          timerState.intervalId = setInterval(function() {
            timerState.timeRemaining -= 0.1;
            
            CountdownTimer.updateDisplay();
            
            if (timerState.onTick) {
              timerState.onTick(timerState.timeRemaining);
            }
            
            if (timerState.timeRemaining <= 0) {
              timerState.timeRemaining = 0;
              CountdownTimer.updateDisplay();
              CountdownTimer.stop('lose');
            }
          }, 100);
          
          this.setPausedState(false);
          console.log('[Timer] Started: ' + this.formatTime(timerState.timeRemaining) + ' remaining');
          return this;
        },
        
        stop: function(result) {
          if (timerState.intervalId) {
            clearInterval(timerState.intervalId);
            timerState.intervalId = null;
          }
          
          timerState.isRunning = false;
          timerState.isFinished = true;
          timerState.isPaused = true;
          
          var timeUsed = timerState.maxTime - timerState.timeRemaining;
          var resultData = {
            timeRemaining: timerState.timeRemaining,
            timeUsed: timeUsed,
            totalTime: timerState.maxTime,
            won: result === 'win',
            formatted: {
              remaining: this.formatTime(timerState.timeRemaining),
              used: this.formatTime(timeUsed),
              total: this.formatTime(timerState.maxTime)
            }
          };
          
          if (result === 'win') {
            console.log('[Timer] Game won! Time used: ' + this.formatTime(timeUsed));
            if (timerState.onWin) {
              timerState.onWin(resultData);
            }
            if (timerState.onComplete) {
              timerState.onComplete(resultData);
            }
          } else {
            console.log('[Timer] Game lost! Time ran out.');
            if (timerState.onLose) {
              timerState.onLose(resultData);
            }
            if (timerState.onComplete) {
              timerState.onComplete(resultData);
            }
          }
          
          // Reset and go back to menu
          var self = this;
          setTimeout(function() {
            self.reset();
            self.hideTimer();
            // Reset cube and go to menu
            if (window.game) {
              window.game.cube.reset();
              window.game.state = 0; // Menu state
              window.game.transition.title(true);
              window.game.transition.buttons(['stats', 'prefs'], []);
              window.game.controls.disable();
              // Show note
              if (noteElement) {
                noteElement.style.opacity = 1;
                noteElement.textContent = 'Double tap to start';
              }
              if (titleElement) {
                titleElement.style.opacity = 1;
              }
            }
            console.log('[Timer] Reset complete - back to menu');
          }, 500);
          
          return resultData;
        },
        
        reset: function() {
          if (timerState.intervalId) {
            clearInterval(timerState.intervalId);
            timerState.intervalId = null;
          }
          
          timerState.timeRemaining = timerState.maxTime;
          timerState.isRunning = false;
          timerState.isPaused = true;
          timerState.isFinished = false;
          
          this.updateDisplay();
          this.setPausedState(true);
          console.log('[Timer] Reset to ' + this.formatTime(timerState.maxTime) + ' (paused)');
          return this;
        },
        
        pause: function() {
          if (!timerState.isRunning) {
            console.warn('[Timer] Not running');
            return this;
          }
          if (timerState.isPaused) {
            console.warn('[Timer] Already paused');
            return this;
          }
          
          if (timerState.intervalId) {
            clearInterval(timerState.intervalId);
            timerState.intervalId = null;
          }
          
          timerState.isPaused = true;
          timerState.isRunning = false;
          this.setPausedState(true);
          console.log('[Timer] Paused at ' + this.formatTime(timerState.timeRemaining));
          return this;
        },
        
        resume: function() {
          if (timerState.isPaused && !timerState.isFinished) {
            timerState.isRunning = true;
            timerState.isPaused = false;
            
            timerState.intervalId = setInterval(function() {
              timerState.timeRemaining -= 0.1;
              
              CountdownTimer.updateDisplay();
              
              if (timerState.onTick) {
                timerState.onTick(timerState.timeRemaining);
              }
              
              if (timerState.timeRemaining <= 0) {
                timerState.timeRemaining = 0;
                CountdownTimer.updateDisplay();
                CountdownTimer.stop('lose');
              }
            }, 100);
            
            this.setPausedState(false);
            console.log('[Timer] Resumed');
          } else {
            console.warn('[Timer] Cannot resume - not paused or finished');
          }
          return this;
        },
        
        // ===== UTILITY METHODS =====
        formatTime: function(seconds) {
          var mins = Math.floor(seconds / 60);
          var secs = Math.floor(seconds % 60);
          return mins + ':' + (secs < 10 ? '0' : '') + secs;
        },
        
        showTimer: function() {
          // Hide the back button while the game timer is visible (gameplay)
          try {
            var backBtnEl = document.querySelector('.btn--back');
            if (backBtnEl) backBtnEl.style.display = 'none';
          } catch (e) {}
          customTimer.classList.add('visible');
          return this;
        },
        
        hideTimer: function() {
          // Restore the back button when the game timer is hidden (menu)
          try {
            var backBtnEl = document.querySelector('.btn--back');
            if (backBtnEl) backBtnEl.style.display = '';
          } catch (e) {}
          customTimer.classList.remove('visible');
          return this;
        },
        
        getTimeRemaining: function() {
          return timerState.timeRemaining;
        },
        
        getTimeUsed: function() {
          return timerState.maxTime - timerState.timeRemaining;
        },
        
        getMaxTime: function() {
          return timerState.maxTime;
        },
        
        isRunning: function() {
          return timerState.isRunning;
        },
        
        isPaused: function() {
          return timerState.isPaused;
        },
        
        isFinished: function() {
          return timerState.isFinished;
        },
        
        // ===== INTERNAL METHODS =====
        setPausedState: function(paused) {
          if (!timerDisplay) return;
          if (paused) {
            timerDisplay.classList.add('paused');
          } else {
            timerDisplay.classList.remove('paused');
          }
        },
        
        updateDisplay: function() {
          var timeString = this.formatTime(timerState.timeRemaining);
          
          if (timerElement) {
            timerElement.textContent = timeString;
          }
          
          if (timerDisplay) {
            timerDisplay.textContent = timeString;
          }
          
          if (timerBar) {
            var percent = (timerState.timeRemaining / timerState.maxTime) * 100;
            timerBar.style.width = Math.max(0, percent) + '%';
          }
          
          if (timerDisplay) {
            timerDisplay.className = 'timer-value';
            
            if (timerState.isPaused) {
              timerDisplay.classList.add('paused');
            } else if (timerState.timeRemaining <= CONFIG.dangerThreshold && timerState.timeRemaining > 0) {
              timerDisplay.classList.add('danger');
            } else if (timerState.timeRemaining <= CONFIG.warningThreshold) {
              timerDisplay.classList.add('warning');
            }
          }
          
          if (timerBar) {
            timerBar.className = 'timer-bar';
            if (timerState.timeRemaining <= CONFIG.dangerThreshold && timerState.timeRemaining > 0) {
              timerBar.classList.add('danger');
            } else if (timerState.timeRemaining <= CONFIG.warningThreshold) {
              timerBar.classList.add('warning');
            }
          }
        }
      };
      
      // ============================================
      // EXPOSE TO CONSOLE FOR DEVELOPER
      // ============================================
      window.countdownTimer = CountdownTimer;
      window.timerConfig = CONFIG;
      
      console.log('===========================================');
      console.log('COUNTDOWN TIMER SYSTEM - DEVELOPER API');
      console.log('===========================================');
      console.log('Default time: 30 minutes (1800 seconds)');
      console.log('');
      console.log('DEVELOPER COMMANDS:');
      console.log('  countdownTimer.setDefaultTime(120)     - Set default to 2 min');
      console.log('  countdownTimer.setWarningThreshold(15) - Warning at 15s');
      console.log('  countdownTimer.setDangerThreshold(5)   - Danger at 5s');
      console.log('  countdownTimer.setMaxTime(600)         - Max 10 min');
      console.log('  countdownTimer.init()                  - Re-initialize');
      console.log('  countdownTimer.start()                 - Start timer');
      console.log('  countdownTimer.pause()                 - Pause timer');
      console.log('  countdownTimer.resume()                - Resume timer');
      console.log('  countdownTimer.reset()                 - Reset timer');
      console.log('  countdownTimer.stop("win")             - Stop as win');
      console.log('  countdownTimer.stop("lose")            - Stop as lose');
      console.log('  countdownTimer.formatTime(125)         - Format seconds');
      console.log('  countdownTimer.getTimeRemaining()      - Get remaining');
      console.log('  countdownTimer.getTimeUsed()           - Get time used');
      console.log('===========================================');
      
      // ============================================
      // INTEGRATE WITH GAME
      // ============================================
      
      var checkGameReady = setInterval(function() {
        if (window.game && window.game.world) {
          clearInterval(checkGameReady);
          
          // Initialize with 30 minutes
          CountdownTimer.init({
            defaultTime: 1800,
            warningThreshold: 60,
            dangerThreshold: 30
          });
          
          var originalGameStart = window.game.game;
          var originalOnSolved = window.game.controls.onSolved;
          var originalBackHandler = window.game.dom.buttons.back.onclick;
          
          // Override game start
          window.game.game = function(show) {
            if (show) {
              var betAmount = 10;
              
              modal.show
                '<p>Get ready to solve the cube!</p>' +
                '<p>You have <span class="highlight">' + CountdownTimer.formatTime(CONFIG.defaultTime) + '</span> to solve it.</p>' +
                '<p>Bet amount: <span class="highlight">$' + betAmount + '</span></p>' +
                '<p style="margin-top: 0.8em; font-size: 0.85em; color: #888;">' +
                'Solve before time runs out to win!</p>',
                {
                  title: 'Start Game',
                  confirmText: 'Start',
                  dismissText: 'Cancel',
                  showDismiss: true,
                  autoClose: 0,
                  callback: function(action) {
                    if (action === 'confirm') {
                      CountdownTimer.reset();
                      CountdownTimer.start(
                        function(result) {
                          console.log('Game complete:', result);
                        },
                        function(timeRemaining) {
                          // Timer display already updated
                        },
                        function(result) {
                          modal.success(
                            '<p>Congratulations! You solved the cube!</p>' +
                            '<p>Time remaining: <span class="highlight">' + 
                              result.formatted.remaining + '</span></p>' +
                            '<p>You won <span class="highlight">$' + (betAmount * 2) + '</span>!</p>',
                            {
                              title: 'You Win!',
                              confirmText: 'Collect Winnings',
                              showDismiss: false,
                              autoClose: 0,
                              callback: function() {
                                console.log('Winnings collected: $' + (betAmount * 2));
                              }
                            }
                          );
                        },
                        function(result) {
                          modal.error(
                            '<p>Time ran out!</p>' +
                            '<p>You lost <span class="text-danger">$' + betAmount + '</span></p>' +
                            '<p>Better luck next time!</p>',
                            {
                              title: 'Time\'s Up!',
                              confirmText: 'Try Again',
                              showDismiss: true,
                              autoClose: 0,
                              callback: function(action) {
                                if (action === 'confirm') {
                                  window.game.game(true);
                                }
                              }
                            }
                          );
                        }
                      );
                      
                      originalGameStart.call(window.game, true);
                    } else {
                      CountdownTimer.reset();
                      CountdownTimer.hideTimer();
                      console.log('Game cancelled - timer reset');
                    }
                  }
                }
              );
            } else {
              if (CountdownTimer.isRunning() || !CountdownTimer.isPaused()) {
                CountdownTimer.reset();
                CountdownTimer.hideTimer();
                console.log('Game stopped - timer reset');
              }
              originalGameStart.call(window.game, false);
            }
          };
          
          // Override solve detection
          window.game.controls.onSolved = function() {
            if (CountdownTimer.isRunning() && !CountdownTimer.isFinished()) {
              CountdownTimer.stop('win');
              console.log('Cube solved!');
            }
            
            if (typeof originalOnSolved === 'function') {
              originalOnSolved.call(this);
            }
          };
          
          // Override back button
          window.game.dom.buttons.back.onclick = function(event) {
            if (CountdownTimer.isRunning() || !CountdownTimer.isPaused()) {
              CountdownTimer.reset();
              CountdownTimer.hideTimer();
              console.log('Back button - timer reset');
            }
            if (typeof originalBackHandler === 'function') {
              originalBackHandler.call(this, event);
            }
          };
          
          // Show welcome modal
          setTimeout(function() {
            modal.show(
              '<p>Welcome to <span class="highlight">The Cube</span>!</p>' +
              '<p>You have <span class="highlight">' + CountdownTimer.formatTime(CONFIG.defaultTime) + '</span> to solve.</p>' +
              '<p style="margin-top: 0.8em; font-size: 0.85em; color: #888;">' +
              'Double tap to start. Solve before time runs out!</p>',
              {
                title: 'Welcome!',
                confirmText: 'Let\'s Go!',
                dismissText: 'Go Back',
                showDismiss: true,
                autoClose: 5000,
                callback: function(action) {
                  console.log('Welcome modal closed with action:', action);
                }
              }
            );
          }, 1000);
        }
      }, 100);
      
      // ============================================
      // MODAL CONTROLLER
      // ============================================
      
      var ModalController = function() {
        this.modal = document.getElementById('notificationModal');
        this.body = document.getElementById('modalBody');
        this.closeBtn = document.getElementById('modalClose');
        this.confirmBtn = document.getElementById('modalConfirm');
        this.dismissBtn = document.getElementById('modalDismiss');
        this.callback = null;
        this.isOpen = false;
        this.initEvents();
      };
      
      ModalController.prototype.initEvents = function() {
        var self = this;
        
        this.closeBtn.addEventListener('click', function() { self.hide(); });
        this.confirmBtn.addEventListener('click', function() {
          if (self.callback) self.callback('confirm');
          self.hide();
        });
        this.dismissBtn.addEventListener('click', function() {
          if (self.callback) self.callback('dismiss');
          self.hide();
        });
        
        var overlay = this.modal.querySelector('.modal-overlay');
        overlay.addEventListener('click', function() {
          if (self.callback) self.callback('overlay');
          self.hide();
        });
        
        document.addEventListener('keydown', function(e) {
          if (e.key === 'Escape' && self.isOpen) {
            if (self.callback) self.callback('escape');
            self.hide();
          }
        });
      };
      
      ModalController.prototype.show = function(content, options) {
        options = options || {};
        
        var title = options.title || 'Notification';
        var type = options.type || '';
        var confirmText = options.confirmText || 'Got it!';
        var dismissText = options.dismissText || 'Dismiss';
        var showDismiss = options.showDismiss !== undefined ? options.showDismiss : true;
        var autoClose = options.autoClose || 0;
        var callback = options.callback || null;
        
        if (typeof content === 'string') {
          this.body.innerHTML = content;
        } else if (content instanceof HTMLElement) {
          this.body.innerHTML = '';
          this.body.appendChild(content);
        }
        
        this.modal.querySelector('.modal-title').textContent = title;
        this.modal.querySelector('.modal-container').className = 'modal-container';
        if (type) {
          this.modal.querySelector('.modal-container').classList.add('type-' + type);
        }
        
        this.confirmBtn.textContent = confirmText;
        this.dismissBtn.textContent = dismissText;
        this.dismissBtn.style.display = showDismiss ? 'block' : 'none';
        this.callback = callback || null;
        
        this.modal.classList.add('active');
        this.isOpen = true;
        
        var self = this;
        if (autoClose > 0) {
          setTimeout(function() {
            if (self.isOpen) {
              if (self.callback) self.callback('auto');
              self.hide();
            }
          }, autoClose);
        }
      };
      
      ModalController.prototype.hide = function() {
        this.modal.classList.remove('active');
        this.isOpen = false;
        this.callback = null;
      };
      
      ModalController.prototype.notify = function(message, options) {
        options = options || {};
        var defaultOptions = {
          title: 'Notification',
          type: '',
          confirmText: 'Got it!',
          showDismiss: true,
          autoClose: 3000
        };
        for (var key in defaultOptions) {
          if (options[key] === undefined) options[key] = defaultOptions[key];
        }
        this.show('<p>' + message + '</p>', options);
      };
      
      ModalController.prototype.success = function(message, options) {
        options = options || {};
        options.type = 'success';
        this.show(message, options);
      };
      
      ModalController.prototype.warning = function(message, options) {
        options = options || {};
        options.type = 'warning';
        this.show(message, options);
      };
      
      ModalController.prototype.error = function(message, options) {
        options = options || {};
        options.type = 'danger';
        this.show(message, options);
      };
      
      ModalController.prototype.info = function(message, options) {
        options = options || {};
        this.show(message, options);
      };
      
      var modal = new ModalController();
      window.modal = modal;
      
    })();
  </script>
@endsection