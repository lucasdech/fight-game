// Cette ligne sélectionne un élément HTML avec l'identifiant "fight" et le stocke dans la variable "fight".
let fight = document.querySelector('#fight')


// Cela ajoute un écouteur d'événements au clic sur l'élément sélectionné précédemment ("fight").
// Lorsque cet élément est cliqué, la fonction anonyme qui suit sera exécutée.
fight.addEventListener('click', function(){

  // Ceci sélectionne un élément HTML avec l'identifiant "coupDePoing" et joue le son associé.
  document.querySelector('#coupDePoing').play()
  
  // Cela sélectionne un élément HTML avec l'identifiant "fireBall" et accède à sa liste de classes CSS.
    let fireBall = document.querySelector('#fireBall').classList

    // Ces lignes alternent entre l'ajout et la suppression des classes CSS "fireBallHidden" et
    // "fireBall" sur l'élément sélectionné précédemment. Cela permet de changer l'apparence de l'élément.
    fireBall.toggle("fireBallHidden")
    fireBall.toggle("fireBall")


// De manière similaire à la ligne précédente, cela sélectionne un 
// élément HTML avec l'identifiant "shuriken" et accède à sa liste de classes CSS.
    let shuriken = document.querySelector('#shuriken').classList
   

    // Comme précédemment, ces lignes alternent entre l'ajout et la suppression des classes CSS
    //  "shurikenHidden" et "shuriken" sur l'élément sélectionné, modifiant ainsi son apparence.
    shuriken.toggle("shurikenHidden")
    shuriken.toggle("shuriken")

})



    // AJAX FORM DATA POUR PASSER L'ID DU HERO

    // ette ligne sélectionne un élément HTML avec l'identifiant "fight" et le stocke dans la variable "test".
  let test = document.querySelector('#fight')


  // Cela ajoute un écouteur d'événements au clic sur l'élément sélectionné précédemment ("test"). 
  // Lorsque cet élément est cliqué, la fonction anonyme qui suit sera exécutée.
      test.addEventListener('click', function(){

        // Cela crée un nouvel objet FormData, qui est utilisé pour envoyer
        // des données sous forme de paires clé/valeur à un serveur sous forme de formulaire.
            let formData = new FormData();
                    
            // Ces lignes extraient les valeurs des attributs "data-hero_id" et "data-monster_id"
            // de l'élément "test" et les stockent dans les variables "hero_id" et "monster_id"
            // respectivement. Ces attributs "data-" contiennent des données personnalisées associées à l'élément HTML.
            let hero_id =  test.dataset.hero_id
            let monster_id =  test.dataset.monster_id

            // Ces lignes ajoutent les valeurs extraites précédemment ("hero_id" et "monster_id")
            // à l'objet FormData, avec les clés "hero_id" et "monster_id".
            formData.append("hero_id", hero_id);
            formData.append("monster_id", monster_id);
            
            
            
            // Cette ligne effectue une requête fetch vers le fichier "fight_AJAX.php" situé dans le répertoire "process"
            // de votre serveur. Les données envoyées sont les données stockées dans l'objet FormData, envoyées avec la méthode HTTP POST.
               fetch("./process/fight_AJAX.php", {
                 method : "post",
                 body : formData
               })

              //  Cette méthode "then" de la Promesse (Promise) traite la réponse de la requête
              //  fetch en la convertissant en format JSON.
               .then((resp)=>{
                   return resp.json();
                 })

                //  Une fois que la réponse a été convertie en JSON, cette partie du code est exécutée.
                //  Elle affiche les données de la réponse dans la console du navigateur.
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
                      //  console.log("ppl");

                       
                    }
                    


                 })                
    })

