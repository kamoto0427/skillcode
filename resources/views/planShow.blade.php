<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          {{ __('プラン詳細') }}
      </h2>
  </x-slot>
  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
          <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
              <section class="text-gray-600 body-font">
                  <div class="container px-5 py-24 mx-auto">
                      <div class="flex flex-wrap -m-4">
                      <div class="p-4 md:w-1/2">
                          <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                          <div class="p-6">
                              <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">タグ：{{ $plan_show->tag_name }}</h2>
                              <h1 class="title-font text-lg font-medium text-gray-900 mb-3">{{ $plan_show->plan_title }}</h1>
                              <p class="leading-relaxed mb-3">{{ $plan_show->plan_explanation }}</p>
                              <p class="leading-relaxed mb-3">{{ $plan_show->user_name }}</p>
                              <p class="leading-relaxed mb-3">評価：{{ $plan_show->rating }}</p>
                              <div class="flex items-center flex-wrap">
                          </div>
                      </div>
                  </div>
              </section>
          </div>
      </div>
  </div>
</x-app-layout>
