<h1>プラン登録</h1>
<form action="{{ route('plan.store') }}" method="POST">
@csrf
    <p>タイトル</p>
    <input type="text" name="plan_title" maxlength="30"/>
    <br/>
    <p>説明</p>
    <input type="text" name="plan_explanation" maxlength="30"/>
    <br/>
    <div class="form-group">
        <label for="tag-id">{{ __('タグ') }}</label>
        <select class="form-select" id="tag-id" name="tag_id">
            @foreach ($tags as $tag)
                <option value="{{ $tag->tag_id }}">{{ $tag->tag_name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="plan-status">{{ __('ステータス') }}</label>
        <select class="form-select" id="plan-status" name="plan_status">
            <option value="1">{{ '教える' }}</option>
            <option value="2">{{ '学ぶ' }}</option>
        </select>
    </div>
    <p>金額</p>
    <input type="text" name="amount" maxlength="30"/>
    <br/>
    <input type="submit" value="登録" />
</form>