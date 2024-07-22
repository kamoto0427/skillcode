<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('プロフィール編集') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("プロフィール情報とメールアドレスを更新できます。") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="user-name" :value="__('アカウント名')" />
            <x-text-input id="user-name" name="user_name" type="text" class="mt-1 block w-full" :value="old('user_name', $user->user_name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('user_name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('メールアドレス')" />
            <div>{{ $user->email }}</div>
        </div>

        <div>
            <x-input-label for="self_introduction" :value="__('自己紹介文')" />
            <x-text-input id="self_introduction" name="self_introduction" type="text" class="mt-1 block w-full" :value="old('self_introduction', $user->self_introduction)" autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('self_introduction')" />
        </div>

        <select class="form-select" id="user_status" name="user_status">
            <option value="1">{{ '教える側' }}</option>
            <option value="2">{{ '学ぶ側' }}</option>
        </select>

        <div>
            <x-input-label for="career" :value="__('経歴・実績')" />
            <x-text-input id="career" name="career" type="text" class="mt-1 block w-full" :value="old('career', $user->career)" autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('career')" />
        </div>

        <div>
            <x-input-label for="portfolio_1" :value="__('ポートフォリオ①')" />
            <x-text-input id="portfolio_1" name="portfolio_1" type="text" class="mt-1 block w-full" :value="old('portfolio_1', $user->portfolio_1)" autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('portfolio_1')" />
        </div>

        <div>
            <x-input-label for="portfolio_1" :value="__('ポートフォリオ①')" />
            <x-text-input id="portfolio_1" name="portfolio_1" type="text" class="mt-1 block w-full" :value="old('portfolio_1', $user->portfolio_1)" autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('portfolio_1')" />
        </div>

        <div>
            <x-input-label for="portfolio_1_url" :value="__('ポートフォリオ①URL')" />
            <x-text-input id="portfolio_1_url" name="portfolio_1_url" type="text" class="mt-1 block w-full" :value="old('portfolio_1_url', $user->portfolio_1_url)" autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('portfolio_1_url')" />
        </div>

        <div>
            <x-input-label for="portfolio_2" :value="__('ポートフォリオ②')" />
            <x-text-input id="portfolio_2" name="portfolio_2" type="text" class="mt-1 block w-full" :value="old('portfolio_2', $user->portfolio_2)" autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('portfolio_2')" />
        </div>

        <div>
            <x-input-label for="portfolio_2_url" :value="__('ポートフォリオ②URL')" />
            <x-text-input id="portfolio_2_url" name="portfolio_2_url" type="text" class="mt-1 block w-full" :value="old('portfolio_2_url', $user->portfolio_2_url)" autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('portfolio_2_url')" />
        </div>

        <div>
            <x-input-label for="portfolio_3" :value="__('ポートフォリオ③')" />
            <x-text-input id="portfolio_3" name="portfolio_3" type="text" class="mt-1 block w-full" :value="old('portfolio_3', $user->portfolio_3)" autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('portfolio_3')" />
        </div>

        <div>
            <x-input-label for="portfolio_3_url" :value="__('ポートフォリオ③URL')" />
            <x-text-input id="portfolio_3_url" name="portfolio_3_url" type="text" class="mt-1 block w-full" :value="old('portfolio_3_url', $user->portfolio_3_url)" autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('portfolio_3_url')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('保存') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('保存しました。') }}</p>
            @endif
        </div>
    </form>
</section>
