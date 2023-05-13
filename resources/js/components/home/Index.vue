<template>
   <div>
       <div class="grid md:grid-cols-2 gap-4">
           <div class="max-w-sm rounded overflow-hidden shadow-lg bg-white">
               <div class="px-6 py-4">
                   <ul class="max-w-md space-y-1 text-gray-500 list-none list-inside dark:text-gray-400">
                       <li class="py-4">
                          <div class="flex justify-between">
                            <span class="text-black font-semibold">اختبار اختيارات متعددة</span>
                            <span class="text-black"><i class="fa fa-list-ul fa-lg"></i></span>
                          </div>
                       </li>
                       <li class="py-4">
                        <div class="flex justify-between">
                            <span class="text-black font-semibold">الزمن المقدر لنهاية اﻻمتحان</span>
                            <span class="text-black"><i class="fa fa-clock fa-lg"></i></span>
                        </div>
                       </li>
                       <li class="py-4">
                            <div class="flex justify-between">
                                <span class="text-black font-semibold">عدد اﻻسئلة</span>
                                <span class="text-black"><i class="fa fa-question-circle fa-lg"></i></span>
                            </div>
                       </li>
                   </ul>
               </div>
               <div class="px-6 py-3 mb-2">
                   <!-- <button
                       type="button"
                       class="h-12 px-6 m-2 text-lg border border-gray-700 text-gray-700 rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:text-white hover:bg-gray-800 focus:outline-none focus:shadow-outline">
                       اﻹختبار
                   </button> -->
                   <router-link :to="{name : 'ExamIndex'}"
                   class="bg-black hover:text-white hover:bg-gray-800 text-gray-100 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
    اﻹختبار
    </router-link>
               </div>
           </div>
       </div>
   </div>
</template>

<script>

</script>

