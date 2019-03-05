<!doctype html>
<html lang="de">
<head>
  <meta charset="UTF-8">
    <meta name="description" content="Shovel Knight Characters">
    <meta name="keywords" content="shovel knight, character,game,php">
    <meta name="author" content="Vinicius Pontes, Timo Mayer">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shovel Knight</title>

    <link rel="stylesheet" type="text/css" href="/css/style.css" >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

  </head> 
  <body>
    <main class="container">
      <?= $viewOutput; ?>
    </main>

    <footer class="footer">
      <div class="container">
        <span class="text-muted">&copy; Shovel Knight 2019 | Pontes & Mayer</span>
      </div>
    </footer>

    <!-- EASTER EGG -->
    <script>
      const knight = document.getElementById("easterEgg");
      const hint = document.getElementById("hint");
      const maxWidth = document.body.clientWidth;
      const tempo = 25;
      const jump = -200;
      let dir = true;

      window.onkeydown = function(e) { 
        return !(e.keyCode == 32);
      };
      
      // Run when Knight is clicked
      document.getElementById("raiseKnight").addEventListener("click", event => {
        this.activateKnight();
      });

      // Run when a Key is pressed
      document.addEventListener("keydown", event => {
        const pos = getTranslateX(knight);
        const knightWidth = knight.offsetWidth;

        //Key "j" or Left Arrow
        if (event.isComposing || event.keyCode === 74 || event.keyCode == 37) {
          dir = false;
          if (!(pos <= 0)) {
            knight.style.WebkitTransform = `translate(${pos - tempo}px) rotateY(180deg)`;
            knight.style.transfrom = `translate(${pos + tempo}px) rotateY(180deg)`;
          }
        }
         
        //Key "l" or Right Arrow
        if (event.isComposing || event.keyCode === 76 || event.keyCode == 39) {
          dir = true;
          if (!(pos >= (maxWidth - knightWidth))) {
            knight.style.WebkitTransform = `translate(${pos + tempo}px) rotateY(0deg)`;
            knight.style.transfrom = `translate(${pos + tempo}px) rotateY(0deg)`;
          }
        }

        //Key Spacebar or Upper Arrow
        if (event.isComposing || event.keyCode === 32 || event.keyCode === 38) {
          if (!dir) {
            knight.style.WebkitTransform = `translate(${pos}px, ${jump}px) rotateY(180deg)`;
            knight.style.transfrom = `translate(${pos}px, ${jump}px) rotateY(180deg)`;
          } 
          else {
            knight.style.WebkitTransform = `translate(${pos}px, ${jump}px)`;
            knight.style.transfrom = `translate(${pos}px, ${jump}px)`;
          }
          
          setTimeout(() => {
            if (!dir) {
              knight.style.WebkitTransform = `translate(${pos}px, 0) rotateY(180deg)`;
              knight.style.transfrom = `translate(${pos}px, 0) rotateY(180deg)`;
          } 
          else {
            knight.style.WebkitTransform = `translate(${pos}px, 0)`;
            knight.style.transfrom = `translate(${pos}px, 0)`;
          }
            
          }, 200);
        }

        if (event.isComposing || event.keyCode === 82) {
          activateKnight();
        }

        if (event.isComposing || event.keyCode === 75) {
          shootFireball();
        }
      });

      function activateKnight() {
        hint.style.visibility = "hidden";
        const audio = document.createElement("audio");
        const audioSource = document.createElement("source");
        audioSource.setAttribute("src", "../bgm/theme.mp3");
        audioSource.setAttribute("type", "audio/mp3");
        audio.setAttribute("autoplay", "");
        
        const img = "../images/shovel_knight_header_gone.gif";
        const bg = document.getElementById("headerBg");
        const knight = document.getElementById("easterEgg");
        knight.style.visibility = "visible";
        bg.style.backgroundImage = "url(" + img + ")";

        audio.appendChild(audioSource);
        knight.appendChild(audio);
      };

      function rotateKnight() {

      }

      function shootFireball() {
                
        const fireball = document.createElement("div");
        fireball.classList.add("fireball");
        fireball.setAttribute("id", "fireball");
        knight.appendChild(fireball);

        setTimeout(() => {
          fireball.style.WebkitTransform = `translate(${maxWidth}px, 0)`;
          fireball.style.transform = `translate(${maxWidth}px, 0)`;
        }, 10);
        setTimeout(() => {
          fireball.remove();
        }, 1000);
        const fireballPos = fireball.getBoundingClientRect();
      }

      function getTranslateX(knight) {
        var style = window.getComputedStyle(knight);
        var matrix = new WebKitCSSMatrix(style.webkitTransform);
        return matrix.m41;
      }
    </script>
  </body>
</html>


