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

                    let appendHero = document.querySelector('#fight-hero');
                    let appendMonster = document.querySelector('#fight-monster');
                    
                    

                    // if ($Hero->getHP() > 0 || $Monster->getHealth_points() > 0) {
                      
                      appendHero.innerHTML += `<div class="text-success"> ${data['hero']} </div>`;
                      appendMonster.innerHTML += `<div class="text-white"> ${data['monster']} </div>`;
                    // }

                    // console.log(data['hero'])
                    // console.log(data['monster'])
                    console.log(data)


                 })                
    })

