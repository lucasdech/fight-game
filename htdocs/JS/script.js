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


  let test = document.querySelector('#fight')

      test.addEventListener('click', function(){

            let formData = new FormData();
                    
            let hero_id =  test.dataset.hero_id
            let monster_id =  test.dataset.monster_id


            formData.append("hero_id", hero_id);
            formData.append("monster_id", monster_id);
            

               fetch("./process/fight_AJAX.php", {
                 method : "post",
                 body : formData
               })

               .then((resp)=>{
                   return resp.json();
                 })
                 .then((data)=>{
                    console.log(data);

                      // AFFICHER LES ETAPES DU COMBATS 

                    let appendHero = document.querySelector('#fight-hero');
                    let appendMonster = document.querySelector('#fight-monster');
                      
                      appendHero.innerHTML = `<div class="text-success"> ${data['hero']} </div>`;
                      appendMonster.innerHTML = `<div class="text-white"> ${data['monster']} </div>`;
                   
                      // FIN ETAPES DE COMBATS


                      // DEBUT GESTIONS DES BARRES DE VIE HERO ET MONSTER

                    // CACHER LES BARRES 

                  

                    // FIN DE CACHER LES BARRES

                  

                    // RENDRE LA BARRE DE VIE INTERACTIVE 

                    let vieHero = document.querySelector('#vie_Hero')
                    let vieMonster = document.querySelector('#vie_Monster')                  
                  
                    
                    vieHero.innerHTML = ` <div class="progress" role="progressbar" aria-label="Danger example" aria-valuenow="${data.HPhero[0]}" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar bg-danger" style="width: ${data.HPhero[0]}%">${data.HPhero[0]} PV</div> `
                    
                    
                    
                    vieMonster.innerHTML  = ` <div class="w-auto progress" role="progressbar" aria-label="Danger example" aria-valuenow="${data.HPmonster[0]}" aria-valuemin="0" aria-valuemax="150">
                    <div class="progress-bar bg-danger" style="width: ${data.HPmonster[0]}%">${data.HPmonster[0]} PV</div> `
                    
                    
                    if (data.HPhero[0] <= 0 || data.HPmonster[0] <= 0) {
                       test.setAttribute("disabled", true)
                       console.log("ppl");

                       
                    }
                    


                 })                
    })

