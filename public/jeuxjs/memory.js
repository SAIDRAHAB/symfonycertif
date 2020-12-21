var memory = document.getElementById('memory');
var score = document.getElementById('score');
var points = 0;
var step = 1;
var p1,p2;
var timer = document.getElementById('time');


'112233445566'
    .split('')
    .map(x => [x,Math.random()]) //fonction aleatoire
    .sort( (a,b) => a[1]-b[1]) 
    .forEach(function(pic){
        let p = document.createElement('img');
        p.src = 'img/pics/spr0.png';
        p.src0 = 'img/pics/spr'+pic[0]+'.png';
        p.clicked = false;
        memory.appendChild(p);
        
        
      
        
      
    });
    function refresh() { window.location.reload(); }// recharge la page 
  
    
function check(){
    clearTimeout(timer);
    p1.clicked = p2.clicked = false;
    if (p1.src==p2.src){
        // remove pics
        memory.replaceChild(document.createElement('span'), p1);
        memory.replaceChild(document.createElement('span'), p2);
        points += 50;
    } else {
        // turn pics
        p1.src = p2.src = 'img/pics/spr0.png';
        points = Math.max(0, points-20);
    }
    score.textContent = points;
    step = memory.getElementsByTagName('img').length==0 ? 4 : 1;
    if (step==4){ 
      score.textContent += ' Gagné !'
     
      $('#modalgagner').modal('show');
      
      let scoreafficher = document.getElementById('txtmodalgagner');
      scoreafficher.textContent += ' Vous avez Gagné ! Votre score est de ' + points  ;
      console.log(document.getElementById('txtmodalgagner'));

      scoreafficher.setAttribute("data", points);
    }
}

document.addEventListener('click', function(e){
    let t = e.target;
    switch(step){
        case 1: // click first image
            if (t.tagName=='IMG' && !t.clicked){
              
                t.clicked = true;
                t.src = t.src0;
                p1 = t;
                step = 2;
            }
            break;
        case 2: // click second image
            if (t.tagName=='IMG' && !t.clicked){
                t.clicked = true;
                t.src = t.src0;
                p2 = t;
                step = 3;
                timer = setTimeout(check, 2000);
            }
            break;
        case 3: // third click wherever
            check();
            break;
    }
});



    

  $(document).ready(function(){
    var secondes = 0;
    var on = false;
    var reset = false;
    $("#start").click(function(){
      Start();
    }
    );
    $('#exampleModal').modal('show');

    function chrono(){
      secondes += 1;
    
      if(secondes>59){
      clearTimeout(timerID);
        
        refresh();
        
      }
    
      if(secondes<61){
        $("#timer").html(secondes);
        
      }
        
    }
  
    function Start(){
      $("#start").hide();
      if(on==false){
        timerID = setInterval(chrono, 1000);
        on = true;
        reset = false;
      }
    } 
  
    

  
  }); 