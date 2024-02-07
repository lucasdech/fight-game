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

                    let barresDeVie = document.querySelector('#lifebar')
                    let barresDeVie2 = document.querySelector('#lifebar2')

                    barresDeVie.classList.add("HIDDEN")
                    barresDeVie2.classList.add("HIDDEN")

                    // FIN DE CACHER LES BARRES

                  

                    // RENDRE LA BARRE DE VIE INTERACTIVE 

                    let vieHero = document.querySelector('#vie_Hero')
                    let vieMonster = document.querySelector('#vie_Monster')
                      
                      console.log(data['hitHERO']);
                      console.log(data['hitMONSTER']);


                    let viehero = 10;

                    vieHero.innerHTML = ` <div class="progress" role="progressbar" aria-label="Danger example" aria-valuenow="${viehero}" aria-valuemin="0" aria-valuemax="100">
                                          <div class="progress-bar bg-danger" style="width: ${viehero}%"><?=$Monster->getHealth_points()?> PV</div> `

                    let viemonster = 10;

                    vieMonster.innerHTML  = ` <div class="w-auto progress" role="progressbar" aria-label="Danger example" aria-valuenow="${viemonster}" aria-valuemin="0" aria-valuemax="100">
                                              <div class="progress-bar bg-danger" style="width: ${viemonster}%"><?=$Monster->getHealth_points()?> PV</div> `
                                          
                    
                    


                 })                
    })



let datavie = 100;
do {
  alert( jeux );
 
  barre de vie - getattack;
} while ( vie est < 0);

const seuil = 14;
let compteur = 0;

while ((compteur = seuil)) {
  compteur++;
  /* Faire quelque chose avec compteur */
}
