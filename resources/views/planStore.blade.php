<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('プラン登録') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <form method="post" action="{{ route('plan.store') }}" class="mt-6 space-y-6">
                            @csrf
                            <div>
                                <x-input-label for="plan_title" :value="__('タイトル')" />
                                <x-text-input id="plan_title" name="plan_title" type="text" class="mt-1 block w-full" />
                                <x-input-error class="mt-2" :messages="$errors->get('plan_title')" />
                            </div>
                            <div>
                                <x-input-label for="plan_explanation" :value="__('プランの説明')" />
                                <x-text-input id="plan_explanation" name="plan_explanation" type="text" class="mt-1 block w-full" :value="old('plan_explanation')" required autofocus autocomplete="name" />
                                <x-input-error class="mt-2" :messages="$errors->get('plan_explanation')" />
                            </div>
                            <div class="form-group">
                                <x-input-label for="tag_id" :value="__('タグ')" />
                                <select class="form-select" id="tag-id" name="tag_id">
                                    @foreach ($tags as $tag)
                                        <option value="{{ $tag->tag_id }}">{{ $tag->tag_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <select class="form-select" id="plan_status" name="plan_status">
                                <option value="1">{{ '教える' }}</option>
                                <option value="2">{{ '学ぶ' }}</option>
                            </select>
                            <div>
                                <x-input-label for="amount" :value="__('金額設定')" />
                                <x-text-input id="amount" name="amount" type="text" class="mt-1 block w-full" :value="old('amount')" autofocus autocomplete="name" />
                                <x-input-error class="mt-2" :messages="$errors->get('amount')" />
                            </div>
                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('保存') }}</x-primary-button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
