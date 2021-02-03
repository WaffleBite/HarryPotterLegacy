@extends('layouts.welcome')

@section('content')
    <div id="potions-header"></div>
    <div id="potions-lab" class="max-width mx-auto sm:px-6 lg:px-8">
        <div id="ingredients">
            @foreach($ingredients as $ingredient)
                <div onclick="move(event)" class="tooltip ingredient" id="{{$ingredient->slug}}">
                    <span class="tooltiptext">{{$ingredient->name}}</span>
                </div>
            @endforeach
        </div>

        <div class="cauldron" id="cauldron"></div>

        <br><br>
        <div class="buttons">
            <button class="mix-button" onclick="mixIngredients()">Mix Ingredients</button>
            <br>
            <button class="redo-button" onclick="clearIngredients()">Redo</button>
        </div>


        <div id="generated-potion">
            <div>
                <h1 id="success-message"></h1>
                <h2 id="message"></h2>
                <p id="generatedPotionName"></p>
                <p id="generatedPotionEffect"></p>
            </div>

            <img id="generatedPotionImage" src="" alt="">
        </div>
    </div>


    <script>
        function mixIngredients(){
            var className = document.getElementsByClassName('active');
            var classnameCount = className.length;

            var storedItems = [];

            for(var i = 0; i < classnameCount; i++){
                storedItems.push(className[i].id);
            }

            console.log(storedItems);

            let name = document.getElementById("generatedPotionName");
            let effect = document.getElementById("generatedPotionEffect");
            let image = document.getElementById("generatedPotionImage");


            if(storedItems.includes("ashwinderEgg") && storedItems.includes("tinctureThyme") && storedItems.includes("powderedDragonClaw")  && storedItems.includes("occamyEggshell")){
                setMessage();
                getImageStyles();
                document.getElementById('generated-potion').style.display = 'block';
                @foreach($newMagicLearned as $newMagic)
                    name.innerHTML = "{{$newMagic['name']}}";
                effect.innerHTML = "{{$newMagic['effect']}}";
                image.src = "{{Storage::disk('local')->url($newMagic['image'])}}";
                @endforeach
            }

            else if(storedItems.includes("powderedCommonRue") && storedItems.includes("powderedDragonClaw") && storedItems.includes("ashwinderEgg") && storedItems.includes("runespoorEgg")){
                setMessage();
                getImageStyles();
                document.getElementById('generated-potion').style.display = 'block';
                @foreach($felixFelicis as $felix)
                    name.innerHTML = "{{$felix['name']}}";
                effect.innerHTML = "{{$felix['effect']}}";
                image.src = "{{Storage::disk('local')->url($felix['image'])}}";
                @endforeach
            }

            else if(storedItems.includes("powderedDragonClaw") && storedItems.includes("ashwinderEgg") && storedItems.includes("tinctureThyme")){
                getImageStyles();
                setMessage();
                document.getElementById('generated-potion').style.display = 'block';
                @foreach($dogbreathPotion as $dogbreath)
                    name.innerHTML = "{{$dogbreath['name']}}";
                    effect.innerHTML = "{{$dogbreath['effect']}}";
                    image.src = "{{Storage::disk('local')->url($dogbreath['image'])}}";
                @endforeach
            }

            else if(storedItems.includes("occamyEggshell") && storedItems.includes("powderedDragonClaw") && storedItems.includes("powderedCommonRue")){
                setMessage();
                getImageStyles();
                document.getElementById('generated-potion').style.display = 'block';
                @foreach($baruffioBrainElixir as $baruffio)
                    name.innerHTML = "{{$baruffio['name']}}";
                    effect.innerHTML = "{{$baruffio['effect']}}";
                    image.src = "{{Storage::disk('local')->url($baruffio['image'])}}";
                @endforeach
            }

            else if(storedItems.includes("ashwinderEgg") && storedItems.includes("runespoorEgg") && storedItems.includes("powderedDragonClaw")){
                setMessage();
                getImageStyles();
                document.getElementById('generated-potion').style.display = 'block';
                @foreach($removeMagic as $remove)
                    name.innerHTML = "{{$remove['name']}}";
                    effect.innerHTML = "{{$remove['effect']}}";
                    image.src = "{{Storage::disk('local')->url($remove['image'])}}";
                @endforeach
            }

            else if(storedItems.includes("tinctureThyme") && storedItems.includes("powderedCommonRue")){
                setMessage();
                getImageStyles();
                document.getElementById('generated-potion').style.display = 'block';
                @foreach($angelsTrumpet as $angels)
                    name.innerHTML = "{{$angels['name']}}";
                effect.innerHTML = "{{$angels['effect']}}";
                image.src = "{{Storage::disk('local')->url($angels['image'])}}";
                @endforeach
            }

            else if(storedItems.includes("runespoorEgg") && storedItems.includes("powderedDragonClaw")){
                setMessage();
                getImageStyles();
                document.getElementById('generated-potion').style.display = 'block';
                @foreach($healthPotion as $health)
                    name.innerHTML = "{{$health['name']}}";
                effect.innerHTML = "{{$health['effect']}}";
                image.src = "{{Storage::disk('local')->url($health['image'])}}";
                @endforeach
            }
             else {
                document.getElementById('generated-potion').style.display = 'block';
                failed()
            }
        }

        function failed(){
            document.getElementById("success-message").innerHTML = "Potion Failed!";
        }

        function clearIngredients(){
            let destination = document.getElementById('ingredients');
            let active = document.getElementsByClassName('active');
            let items = document.getElementsByClassName('ingredient');

             for(let i = 0; i < active.length; i++){
                destination.appendChild(active[i]);
             }
             for(let i = 0; i < items.length; i++){
                 items[i].classList.remove('active');
             }

             resetPotion();
            //location.reload();
        }

        function resetPotion(){
            document.getElementById('generated-potion').style.display = 'none';
            document.getElementById('success-message').innerHTML = '';
            document.getElementById('message').innerHTML = '';
            document.getElementById('generatedPotionName').innerHTML = '';
            document.getElementById('generatedPotionEffect').innerHTML = '';
            document.getElementById("generatedPotionImage").src = "";
        }

        function getImageStyles(){
            let image = document.getElementById("generatedPotionImage");
            image.style.width = '500px';
        }

        function setMessage(){
            let success = document.getElementById("success-message");
            success.innerHTML = "Success!"
            let message = document.getElementById("message");
            message.innerHTML = "You created a potion!"
        }

        function move(ev){
            let destination = document.getElementById('cauldron');
            let back = document.getElementById('ingredients');
            let item = ev.currentTarget;

            item.classList.toggle("active");

            destination.appendChild(item);

            if(!item.classList.contains("active")){
                back.appendChild(item);
            }
        }

    </script>
@endsection
