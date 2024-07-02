@extends('layouts.app')

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tout Là-Haut</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    @section('navbar')
        <div class="fixed z-10 w-full"> 
            <a href="{{ route('menu') }}" class="absolute top-8 left-8 bg-gray-400 bg-opacity-65 text-white py-2.5 px-3 border-none rounded-md w-12 text-base inline-block text-center"><i class="fa-solid fa-bars"></i></a>    
            <a class="absolute top-8 right-24 bg-gray-400 bg-opacity-65 text-white py-2.5 px-3 font-bold border-none inline-block text-center rounded w-12 tracking-wide text-base"> <i class="fa-solid fa-user"></i> </a> 
            <a class="absolute top-8 right-8 bg-gray-400 bg-opacity-65 text-white py-2.5 px-3 font-bold border-none inline-block text-center rounded w-12 tracking-wide text-base"> EN </a> 
        </div>
    @endsection


    @section('main')


    <div class="bg-custom-vert h-screen w-full" >
        <div class="flex flex-row"> 
            <img class="w-[550px] h-screen" src="{{ Storage::url('images/cgv.jpg') }}" alt="Cabane intérieur">
            <h1 class=" relative top-60 left-32 text-6xl text-white font-bold "> Réserver <br/> votre séjour </h1>
            <hr class="border-t-4 border-custom-beige w-24 relative top-96 right-52">
        </div>
    </div> 

    <div class="w-full h-screen bg-black"> 

    <img class="w-full h-screen object-cover opacity-50" src="{{ Storage::url('images/reservation.jpg') }}" alt="Cabane au bord de l'eau">
    
   <div class="flex justify-center relative bottom-96">
    <div class="bg-custom-vert w-[800px] h-[200px] rounded"> 

<div class="flex justify-end mr-12 relative top-6">
 <div class="text-custom-beige font-bold text-sm relative top-6 "> Adultes </div>
 <div class="text-custom-beige font-bold ml-8 text-sm"> Enfants <br/> (de 2 à 10 ans)</div>
</div>

    <div class="flex flex-row justify-center p-8">   
<div id="date-range-picker"  class="flex items-center">
    <div class="relative">
      <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
           <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
          </svg>
      </div>
      <input datepicker datepicker-format="dd-mm-yyyy" id="datepicker-range-start" name="start" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Date d'arrivée">
    </div>
    <span class="mx-4 text-white">au</span>
    <div class="relative">
      <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
           <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
          </svg>
      </div>
      <input datepicker datepicker-format="dd-mm-yyyy" id="datepicker-range-end" name="end" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Date de départ">
  </div>
  </div>
  
  <select class="text-sm rounded mx-4">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
    <option value="7">7</option>
    <option value="8">8</option>
    <option value="9">9</option>
    <option value="10">10</option>
    <option value="11">11</option>
    <option value="12">12</option>
    <option value="13">13</option>
    <option value="14">14</option>
  </select>


 
  <select class="text-sm rounded">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
  </select>

  </div>

  <div class="flex flex-row-reverse	">
  <a style="background-color: #C4AA84" class="text-white font-bold text-sm px-4 py-2 rounded-md relative bottom-2 right-8">Vérifier les disponibilités</a>
  </div>


    </div>

    </div>


       
    </div>

















    @endsection


</body>
</html>