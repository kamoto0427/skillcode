<div>
    <!-- It is quality rather than quantity that matters. - Lucius Annaeus Seneca -->
</div>

@foreach ($plan as $data)
    <div>{{ $data->plan_title }}</div>
    <div>{{ $data->user_name }}</div>
    <div>{{ $data->icon_image }}</div>
    <div>{{ $data->amount }}</div>
    <div>{{ $data->plan_status }}</div>
    <div>評価：{{ $data->rating }}</div>
@endforeach

<a href="{{ route('plan.create') }}">プラン登録へ</a>
