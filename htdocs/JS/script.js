let fight = document.querySelector('#fight')

fight.addEventListener('click', function(){

    document.querySelector('#coupDePoing').play()
    
    let fireBall = document.querySelector('#fireBall').classList

    fireBall.toggle("fireBallHidden")
    fireBall.toggle("fireBall")

    let shuriken = document.querySelector('#shuriken').classList
   
    shuriken.toggle("shurikenHidden")
    shuriken.toggle("shuriken")

})



    // AJAX FORM DATA POUR PASSER L'ID DU HERO


  let btnfight = document.querySelector('#fight')

      btnfight.addEventListener('click', function(){

            let hero_id = btnfight.dataset.heroid
            let monster_id = btnfight.dataset.monsterid

            // console.log(hero_id)
            // console.log(monster_id)

               fetch("./process/fight_AJAX.php", {
                 method: "POST",
                 body: 
                    JSON.stringify({heroID: hero_id, monsterID: monster_id})
               })
               .then((res)=>{
                   return res.json()
                 })
                 .then((data)=>{
                  
                  console.log(data)
                      // AFFICHER LES ETAPES DU COMBATS 

                    let appendHero = document.querySelector('#fight-hero');
                    let appendMonster = document.querySelector('#fight-monster');
                      
                      appendHero.innerHTML = `<div class="text-success"> ${data['hero']} </div>`;
                      appendMonster.innerHTML = `<div class="text-white"> ${data['monster']} </div>`;
                   
                      // FIN ETAPES DE COMBATS          


                        // DEBUT GESTIONS DES BARRES DE VIE HERO ET MONSTER
          

                    // RENDRE LA BARRE DE VIE INTERACTIVE 

                    // let vieHero = document.querySelector('#lifebar')
                    // let vieMonster = document.querySelector('#lifebar2')          

                    
                    
                    if (data.HPhero[0] <= 0 || data.HPmonster[0] <= 0) {
                       btnfight.setAttribute("disabled", true)
                    }
                    
                 })                
    })

