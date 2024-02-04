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

        // ESSAIE FORM DATA POUR PASSER L'ID DU HERO
  
let formData = document.querySelector('#test')

    let data_monster = formData.dataset.monster_id;
    let data_hero = formData.dataset.hero_id;
    
    formData.addEventListener('click', function(){
        
        
    console.log(data_hero);
    console.log(data_monster);
    console.log(formData)

})


        // FIN FORM DATA POUR PASSER L'ID DU HEROa



// let test = document.querySelector('#test')

//     test.addEventListener('click', function(){

//         console.log(test)

//         function fightTurn() {

//             fetch("./process/fight_AJAX.php")
//             .then((resp)=>{
//                 return resp.json();
//             })



//         }
//     })


