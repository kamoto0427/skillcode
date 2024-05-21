<h1>プラン登録</h1>
<form action="{{ route('plan.store') }}" method="POST">
@csrf
    <p>タイトル</p>
    <input type="text" name="plan_title" maxlength="30"/>
    <br/>
    <p>説明</p>
    <input type="text" name="plan_explanation" maxlength="30"/>
    <br/>
    <p>ステータス</p>
    <input type="text" name="plan_status" maxlength="30"/>
    <br/>
    <p>金額</p>
    <input type="text" name="amount" maxlength="30"/>
    <br/>
    <input type="submit" value="登録" />
</form>