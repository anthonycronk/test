<?php
/**
 * Logging functionality - saves to log.txt
 */
$logFile = 'log.txt';
$ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
$date = date('Y-m-d H:i:s');
$userAgent = $_SERVER['HTTP_USER_AGENT'] ?? 'unknown';
$referrer = $_SERVER['HTTP_REFERER'] ?? 'direct';

$logEntry = "[$date] IP: $ip | Agent: $userAgent | From: $referrer\n";

// Write to log file (silently fail if it doesn't work)
@file_put_contents($logFile, $logEntry, FILE_APPEND);
@chmod($logFile, 0644);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>rosevile sucks</title>
  <style>
    :root {
      --border-white: 1px solid white;
      --max-content-width: 400px;
    }
    body {
      background: black url('website background.png') no-repeat center center fixed;
      background-size: cover;
      font-family: Helvetica, Arial, sans-serif;
      margin: 0;
      padding: 0;
      text-transform: lowercase;
      color: white;
      min-height: 100vh;
      position: relative;
    }
    body::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: rgba(0, 0, 0, 0.7);
      z-index: -1;
    }
    header {
      text-align: center;
      padding: 40px 20px 10px;
      font-size: 48px;
      font-weight: bold;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);
    }
    nav {
      text-align: center;
      margin: 10px 0 30px;
    }
    nav a {
      display: inline-block;
      margin: 0 10px;
      text-decoration: none;
      font-weight: bold;
      color: black;
      border: var(--border-white);
      padding: 8px 16px;
      background-color: white;
      transition: all 0.3s ease;
      cursor: pointer;
      text-shadow: none;
    }
    nav a:hover {
      background-color: black;
      color: white;
    }
    .main {
      display: flex;
      justify-content: center;
      align-items: flex-start;
      gap: 40px;
      padding: 0 20px 40px;
      flex-wrap: wrap;
    }
    .content-column {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 20px;
      max-width: var(--max-content-width);
    }
    .box {
      border: var(--border-white);
      padding: 20px;
      background-color: rgba(17, 17, 17, 0.8);
      width: 100%;
      backdrop-filter: blur(2px);
    }
    .image-column {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 20px;
      max-width: var(--max-content-width);
    }
    .sign-image, .tape-gif {
      width: 100%;
      height: auto;
      border: var(--border-white);
      background-color: rgba(0, 0, 0, 0.5);
    }
    .footer {
      position: fixed;
      right: 20px;
      bottom: 10px;
      font-size: 12px;
      color: white;
      display: flex;
      flex-direction: column;
      align-items: flex-end;
      text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.8);
    }
    .info-box {
      border: var(--border-white);
      padding: 8px 16px;
      background-color: rgba(0, 0, 0, 0.8);
      font-weight: bold;
      margin-top: 5px;
      text-align: center;
      backdrop-filter: blur(2px);
    }
    .youtube-container {
      width: 100%;
      border: var(--border-white);
      padding: 3px;
      background-color: rgba(0, 0, 0, 0.5);
    }
    .youtube-container iframe {
      width: 100%;
      height: 315px;
      border: var(--border-white);
    }

    /* Compact Piano Styles */
    .piano-container {
      width: 100%;
      max-width: 560px;
      margin: 10px auto 0;
      padding: 10px;
      background-color: rgba(0, 0, 0, 0.7);
      border: var(--border-white);
      backdrop-filter: blur(2px);
    }
    .piano-title {
      text-align: center;
      margin-bottom: 10px;
      font-size: 16px;
    }
    .piano {
      display: flex;
      position: relative;
      height: 100px;
      user-select: none;
    }
    .key {
      position: relative;
      height: 100%;
      display: flex;
      align-items: flex-end;
      justify-content: center;
      padding-bottom: 5px;
      box-sizing: border-box;
      cursor: pointer;
    }
    .white {
      background-color: white;
      border: 1px solid #ccc;
      flex: 1;
      color: black;
      border-radius: 0 0 3px 3px;
      font-size: 10px;
    }
    .black {
      background-color: black;
      width: 22px;
      height: 60%;
      margin-left: -11px;
      margin-right: -11px;
      z-index: 1;
      color: white;
      border-radius: 0 0 3px 3px;
      font-size: 10px;
    }
    .key.active {
      background-color: #4CAF50;
    }
    .black.active {
      background-color: #2E7D32;
    }

    /* Desktop View Button */
    .desktop-view-button {
      display: none;
      width: 90%;
      margin: 20px auto;
      padding: 12px;
      text-align: center;
      background-color: white;
      color: black;
      border: var(--border-white);
      font-weight: bold;
      text-decoration: none;
      cursor: pointer;
    }
    
    .desktop-view-button:hover {
      background-color: black;
      color: white;
    }

    /* Mobile Styles (under 768px) */
    @media (max-width: 768px) {
      :root {
        --max-content-width: 90vw;
      }
      header {
        font-size: 12vw;
        padding: 5vw 5vw 0;
        line-height: 1.2;
      }
      nav {
        margin: 5vw 0;
      }
      nav a {
        margin: 2vw;
        padding: 2vw 4vw;
        font-size: 4vw;
      }
      .main {
        flex-direction: column;
        align-items: center;
        gap: 5vw;
        padding-bottom: 5vw;
      }
      .content-column, .image-column {
        width: 90vw;
        max-width: 100%;
      }
      .box {
        padding: 5vw;
      }
      .youtube-container {
        width: 90vw;
      }
      .youtube-container iframe {
        height: 50vw;
      }
      .piano-container {
        width: 90vw;
        max-width: 100%;
      }
      .footer {
        right: 5vw;
        bottom: 2vw;
        font-size: 3vw;
      }
      .info-box {
        padding: 2vw 4vw;
      }
      .piano {
        height: 80px;
      }
      .black {
        width: 18px;
        margin-left: -9px;
        margin-right: -9px;
      }
      
      .desktop-view-button {
        display: block;
      }
    }

    /* Very small mobile devices */
    @media (max-width: 480px) {
      header {
        font-size: 14vw;
      }
      nav a {
        display: block;
        margin: 1vw auto;
        width: 80%;
      }
      body {
        background-attachment: scroll;
      }
      .piano {
        height: 70px;
      }
      .black {
        width: 15px;
        margin-left: -7.5px;
        margin-right: -7.5px;
      }
    }

    /* Hide desktop button on desktop */
    @media (min-width: 769px) {
      .desktop-view-button {
        display: none !important;
      }
    }
  </style>
</head>
<body>
  <header>rosevile sucks</header>
  <nav>
    <a onclick="window.location.reload()">home</a>
    <a href="https://linktr.ee/rosevilesucks" target="_blank" rel="noopener noreferrer">links</a>
    <a href="https://discord.gg/4K9Xwjpy" target="_blank" rel="noopener noreferrer">discord</a>
  </nav>
  <div class="main">
    <div class="content-column">
      <div class="box">
        <h3>hello everyone welcome to the rosevile sucks website</h3>
        <p>
         this website is a work in progress, just like a bunch of new music and visuals. for now join me in the discord. thanks for visting!
        </p>
      </div>
      <div class="youtube-container">
        <iframe src="https://www.youtube.com/embed/dfb0SEQA3d8?list=RDdfb0SEQA3d8" title="rosevile sucks - i always seem to miss her (Official Music Video)" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
      </div>
      <!-- Compact Piano moved under YouTube player -->
      <div class="piano-container">
        <div class="piano-title">play something</div>
        <div class="piano" id="piano">
          <div class="key white" data-note="C"></div>
          <div class="key black" data-note="C#"></div>
          <div class="key white" data-note="D"></div>
          <div class="key black" data-note="D#"></div>
          <div class="key white" data-note="E"></div>
          <div class="key white" data-note="F"></div>
          <div class="key black" data-note="F#"></div>
          <div class="key white" data-note="G"></div>
          <div class="key black" data-note="G#"></div>
          <div class="key white" data-note="A"></div>
          <div class="key black" data-note="A#"></div>
          <div class="key white" data-note="B"></div>
        </div>
      </div>
    </div>
    <div class="image-column">
      <img src="rosevile_sign.jpeg" alt="rosevile sucks sign" class="sign-image">
      <img src="https://web.archive.org/web/20091024150637/http://www.geocities.com/schall62629/bootleg/Tape.gif" alt="cassette tape gif" class="tape-gif">
    </div>
  </div>

  <div class="footer">
    <div class="info-box">
      <div id="datetime"></div>
      <div id="weather"></div>
    </div>
  </div>

  <script>
    function updateDateTime() {
      const now = new Date();
      const options = { 
        weekday: 'short', 
        year: 'numeric', 
        month: 'short', 
        day: 'numeric',
        hour: '2-digit',
        minute: '2-digit',
        second: '2-digit'
      };
      document.getElementById('datetime').innerText = now.toLocaleDateString('en-US', options);
    }
    updateDateTime();
    setInterval(updateDateTime, 1000);

    async function fetchWeather() {
      try {
        const res = await fetch('https://wttr.in/?format=%t+%c');
        if (res.ok) {
          const text = await res.text();
          document.getElementById('weather').innerText = text;
        } else {
          document.getElementById('weather').innerText = "weather unavailable";
        }
      } catch (error) {
        document.getElementById('weather').innerText = "weather error";
        console.error('Weather fetch error:', error);
      }
    }
    fetchWeather();

    // Piano Functionality
    const pianoKeys = document.querySelectorAll('.key');
    const audioContext = new (window.AudioContext || window.webkitAudioContext)();
    const oscillators = {};

    // Note frequencies for one octave
    const noteFrequencies = {
      'C': 261.63,
      'C#': 277.18,
      'D': 293.66,
      'D#': 311.13,
      'E': 329.63,
      'F': 349.23,
      'F#': 369.99,
      'G': 392.00,
      'G#': 415.30,
      'A': 440.00,
      'A#': 466.16,
      'B': 493.88
    };

    function playNote(note) {
      if (oscillators[note]) return; // Already playing
      
      const oscillator = audioContext.createOscillator();
      const gainNode = audioContext.createGain();
      
      oscillator.type = 'sine';
      oscillator.frequency.value = noteFrequencies[note];
      oscillator.connect(gainNode);
      gainNode.connect(audioContext.destination);
      
      oscillator.start();
      oscillators[note] = { oscillator, gainNode };
      
      // Visual feedback
      const key = document.querySelector(`.key[data-note="${note}"]`);
      key.classList.add('active');
    }

    function stopNote(note) {
      if (!oscillators[note]) return;
      
      const { oscillator, gainNode } = oscillators[note];
      gainNode.gain.exponentialRampToValueAtTime(0.001, audioContext.currentTime + 0.03);
      oscillator.stop(audioContext.currentTime + 0.03);
      
      delete oscillators[note];
      
      // Visual feedback
      const key = document.querySelector(`.key[data-note="${note}"]`);
      key.classList.remove('active');
    }

    // Mouse/Touch events
    pianoKeys.forEach(key => {
      const note = key.getAttribute('data-note');
      
      // Mouse down
      key.addEventListener('mousedown', () => {
        playNote(note);
      });
      
      // Mouse up/leave
      key.addEventListener('mouseup', () => {
        stopNote(note);
      });
      key.addEventListener('mouseleave', () => {
        stopNote(note);
      });
      
      // Touch events for mobile
      key.addEventListener('touchstart', (e) => {
        e.preventDefault();
        playNote(note);
      });
      key.addEventListener('touchend', (e) => {
        e.preventDefault();
        stopNote(note);
      });
    });

    // Keyboard events
    const keyMap = {
      'a': 'C',
      'w': 'C#',
      's': 'D',
      'e': 'D#',
      'd': 'E',
      'f': 'F',
      't': 'F#',
      'g': 'G',
      'y': 'G#',
      'h': 'A',
      'u': 'A#',
      'j': 'B'
    };

    document.addEventListener('keydown', (e) => {
      const note = keyMap[e.key.toLowerCase()];
      if (note && !e.repeat) {
        playNote(note);
      }
    });

    document.addEventListener('keyup', (e) => {
      const note = keyMap[e.key.toLowerCase()];
      if (note) {
        stopNote(note);
      }
    });

    // Desktop view toggle functionality
    function toggleDesktopView() {
      const viewportMeta = document.querySelector('meta[name="viewport"]');
      if (viewportMeta.content.includes('width=device-width')) {
        // Switch to desktop view
        viewportMeta.content = 'width=1200';
        localStorage.setItem('desktopView', 'true');
      } else {
        // Switch back to mobile view
        viewportMeta.content = 'width=device-width, initial-scale=1.0';
        localStorage.removeItem('desktopView');
      }
    }

    // Mobile detection and button management
    function checkMobile() {
      if (window.innerWidth <= 768) {
        document.body.classList.add('mobile');
        // Add button if not already present
        if (!document.querySelector('.desktop-view-button')) {
          const button = document.createElement('a');
          button.className = 'desktop-view-button';
          button.textContent = 'desktop view';
          button.onclick = toggleDesktopView;
          document.querySelector('.main').appendChild(button);
        }
      } else {
        document.body.classList.remove('mobile');
        // Remove button if present
        const button = document.querySelector('.desktop-view-button');
        if (button) button.remove();
      }
    }

    // Check for saved preference on load
    document.addEventListener('DOMContentLoaded', function() {
      if (localStorage.getItem('desktopView') === 'true') {
        document.querySelector('meta[name="viewport"]').content = 'width=1200';
      }
      
      // Initial mobile check
      checkMobile();
    });

    window.addEventListener('resize', checkMobile);
  </script>
</body>
</html>
