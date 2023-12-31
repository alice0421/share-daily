<section class="space-y-6">
    <header>
        <h2 class="text-lg font-bold text-gray-900">
            アカウント削除
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            一度アカウント削除をすると、このアカウントに紐づく全てのデータが完全に削除されます。
        </p>
        <p class="text-sm text-gray-600">
            必要ならば、アカウントを削除する前に全てのデータを別の場所に保存してください。
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >アカウント削除</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                本当にアカウントを削除してもよろしいですか？
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                一度アカウント削除をすると、このアカウントに紐づく全てのデータが完全に削除されます。
            </p>
            <p class="text-sm text-gray-600">
                必要ならば、アカウントを削除する前に全てのデータを別の場所に保存してください。
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Password') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    キャンセル
                </x-secondary-button>

                <x-danger-button class="ml-3">
                    アカウント削除
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
