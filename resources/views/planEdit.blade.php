<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('プラン編集') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <form method="post" action="{{ route('plan.update') }}" class="mt-6 space-y-6">
                            @csrf
                            <x-text-input id="plan_id" name="plan_id" type="hidden" class="mt-1 block w-full" :value="old('plan_id', $plan->plan_id)" />
                            <x-text-input id="user_id" name="user_id" type="hidden" class="mt-1 block w-full" :value="old('user_id', $plan->user_id)" />
                            <div>
                                <x-input-label for="plan_title" :value="__('タイトル')" />
                                <x-text-input id="plan_title" name="plan_title" type="text" class="mt-1 block w-full" :value="old('plan_title', $plan->plan_title)" />
                                <x-input-error class="mt-2" :messages="$errors->get('plan_title')" />
                            </div>
                            <div>
                                <x-input-label for="plan_explanation" :value="__('プランの説明')" />
                                <x-text-input id="plan_explanation" name="plan_explanation" type="text" class="mt-1 block w-full" :value="old('plan_explanation', $plan->plan_explanation)" required autofocus autocomplete="name" />
                                <x-input-error class="mt-2" :messages="$errors->get('plan_explanation')" />
                            </div>
                            <div class="form-group">
                                <x-input-label for="tag_id" :value="__('タグ')" />
                                <select class="form-select" id="tag-id" name="tag_id">
                                    @foreach ($tags as $tag)
                                        <option value="{{ $tag->tag_id }}" {{ $tag->tag_id == old('tag_id', $tag->tag_id) ? 'selected' : '' }}>{{ $tag->tag_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <select class="form-select" id="plan_status" name="plan_status">
                                <option value="1" {{ "1" == old('plan_status', "1") ? 'selected' : '' }}>{{ '教える' }}</option>
                                <option value="2" {{ "2" == old('plan_status', "2") ? 'selected' : '' }}>{{ '学ぶ' }}</option>
                            </select>
                            <div>
                                <x-input-label for="amount" :value="__('金額設定')" />
                                <x-text-input id="amount" name="amount" type="text" class="mt-1 block w-full" :value="old('amount', $plan->amount)" autofocus autocomplete="name" />
                                <x-input-error class="mt-2" :messages="$errors->get('amount')" />
                            </div>
                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('更新') }}</x-primary-button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
