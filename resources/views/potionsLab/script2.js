var Potions = {
   healthPotion20:{name: "Health Potion", effect: "Heals character with 20hp."},
   dogbreathPotion:{name: "Dogbreath Potion", effect: "Gives the drinker a fiery breath. Has a purple hue." },
   angelsTrumpet:{name: "Angel's Trumpet Draught", effect: "Effects and usage of this potion are unknown."},
   baruffioBrainElixir:{name: "Baruffio's Brain Elixir", effect: "A potion that apparently increases the taker's brain power."},
   newMagicLearned:{name: "Chelidonium Miniscula", effect: "The taker will learn a new spell. There is no way of knowing what kind of spell." },
   removeMagic:{name: "Chelidonium Maxiscula", effect: "The taker will forget a randomly chosen spell. Use with caution!!" },
   felixFelicis:{name: "Felix Felicis", effect: "A magical potion that makes the taker successful in all their endeavours." }
};

var Ingredients = {
    Stone: "image",
    Flower: "image"
}

//convert ingredients into array and loop through into a div
var element = document.getElementById("ingredients");
const entries = Object.entries(Ingredients);
for(const [name, image] of entries){
    var ingredientImage = image;
    var div = document.createElement("div");
    div.id = name;
    div.className = "ingredient2";
    div.setAttribute("draggable", true);

    element.appendChild(div);

    div.innerHTML = ingredientImage;

    console.log(ingredientImage)
}


var ingredient2 = document.getElementsByClassName("ingredient2");
var arr = Array.from(ingredient2);
console.log(arr);


function mixIngredients(){
    var className = document.getElementsByClassName('active');
    var classnameCount = className.length;

    var storedItems = new Array();

    for(var i = 0; i < classnameCount; i++){
        storedItems.push(className[i].id);
    }

    if(storedItems.includes("Stone") && storedItems.includes("Flower")){
        document.getElementById("generatedPotionName").innerHTML = Potions.healthPotion20.name;
        document.getElementById("generatedPotionEffect").innerHTML = Potions.healthPotion20.effect;
    };
}



function dragStart(ev){
    //specify the item and data type being dragged
    ev.dataTransfer.setData("text", ev.target.id);
}
function dragEnd(ev){
    ev.currentTarget.classList.toggle("active");
}
function allowDrop(ev){
    //critical. this is what tells the browser to allow drop
    ev.preventDefault(); // This is necessary or the handler will try to open the image link.
}

function dropIt2(ev){
    ev.preventDefault();
    var dataId = ev.dataTransfer.getData("text");
    ev.target.appendChild(document.getElementById(dataId));

}