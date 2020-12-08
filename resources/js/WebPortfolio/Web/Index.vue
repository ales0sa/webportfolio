<template>
    <div>
<!-- This example requires Tailwind CSS v2.0+ -->
<div class="bg-white">
  <div class="max-w-7xl mx-auto py-3 px-3 sm:px-6 lg:px-8">
    <div class="flex items-center justify-between flex-wrap">
      <div class="w-0 flex-1 flex items-center">

        <p class="ml-3 font-medium text-white truncate">
          <span class="md:hidden">
            We announced a new product!
          </span>
          <span class="hidden md:inline">
               <img src="/logo.jpg" />
          </span>
        </p>
      </div>
      <div class="order-3 mt-2 flex-shrink-0 w-full sm:order-2 sm:mt-0 sm:w-auto">
        <a href="mailto:info@donsistema.com.ar" class="flex items-center justify-center px-4 py-2 border border-gray-800 rounded-md shadow-sm text-sm font-medium text-gray-600 bg-white hover:bg-indigo-50">
          info@donsistema.com.ar
        </a>
      </div>

    </div>
  </div>
</div>

        <div>

        </div>
        <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-4 bg-gray-200  gap-4 px-5">

            <div class="rounded-t-xl px-3 py-4 " v-for="web in webs" :key="web.id" >

                <div class="group mx-auto rounded-xl border-4 shadow-md overflow-hidden hover:bg-white hover:shadow-lg 
                transition duration-500 ease-in-out bg-white hover:bg-gray-800 transform hover:-translate-x-1 hover:scale-110 hover:border-gray-800 hover:border-3
                 webImage"  :style="'background-image: url(/storage/'+ web.photo  +
        ');'
        ">
<!--- hover:bg-white hover:shadow-lg 
    transition duration-500 ease-in-out bg-white hover:bg-blue-100 transform hover:-translate-x-1 hover:scale-110  --->
    <div class="group md:flex ">
        <div class="md:flex-shrink-0 ">
     <!--- <img  class="h-48 w-full object-cover md:w-48 image1" :src="'/storage/'+web.photo">   :style="'background-image: url(/storage/'+ web.photo  +
        ');'
        "
        <img  class="h-48 w-full object-cover md:w-48 image1" :src="'/storage/'+web.photo"> h-48 w-full bg-no-repeat object-cover bg-cover md:w-48 bg-top transform group-hover:bg-bottom> --->
        <div id="" class="h-48 w-full md:h-48 md:w-48 lg:w-48 bg-contain ">
<!-- Pin to top right corner -->

        </div>
                <div class="text-center leading-3 w-48 bg-white rounded px-2 py-2 uppercase text-sm text-gray-900 font-bold 
                absolute bottom-1 right-1 
                transition duration-500 ease-in-out bg-white group-hover:bg-gray-800 group-hover:text-white"> {{ web.name }}   </div>
</div>

  <div class="py-3 absolute right-3  py-2 px-2"> <a :href="web.url" target="_blank">



        <svg class="h-5 bg-white rounded" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
      </svg>


</a></div>

  <!--- 
<div class="p-5 flex-row h-16">


  <div class=""> <a :href="web.url"  class="font-bold" target="_blank">

    <button class="bg-indigo-200 ring-4 ring-indigo-300 hover:bg-gray-300 text-grey-darkest font-bold py-1 px-1 rounded inline-flex items-center">
Ver 
        <svg class="h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
      </svg>

  </button>
</a></div>


<techs :techs="web.tech"></techs> 





</div>--->

</div>
</div>



</div>
</div>


</div>
</template>

<script>

    import Techs from './Techs'

    export default {
        props: ['webs'],
        components: {

            Techs,
        },
    }
</script>

<style type="text/css">

.webImage{

    background-size: cover;

  }
.webPortfolio {
    z-index: 999;

}
/*.webPortfolio:hover */
.webImage:hover{
   /*background-position: 0px 0px;*/
   background-repeat: repeat-y;
   /*animation: animatedBackground 4s linear infinite;*/


  -webkit-animation: downSlow 5.5s infinite alternate;
  -moz-animation: downSlow 5.5s infinite alternate;
  animation: downSlow 5.5s infinite alternate;


}
@keyframes animatedBackground {


}
@-webkit-keyframes downSlow {
    from { background-position: 0 0; }
    to { background-position: 0% 100%; }
}
@-moz-keyframes downSlow {
    from { background-position: 0 0; }
    to { background-position: 0% 100%; }
}
@keyframes downSlow {
    from { background-position: 0 0; }
    to { background-position: 0% 100%; }
}


</style>