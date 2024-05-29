<?php

namespace Tests\Unit\Request;

use Tests\TestCase;
use Illuminate\Support\Facades\Validator;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\DataProvider;
use App\Http\Requests\PlanUpdateRequest;

class PlanUpdateRequestTest extends TestCase
{
    /**
     * プラン登録バリデーションテスト
     * OK
     * 正常パターン
     */
    public function test_plan_update_request_ok()
    {
        $rules = (new PlanUpdateRequest())->rules();
        $data = [
            'expected' => true,
            'plan_id' => 1,
            'user_id' => 1,
            'tag_id' => 1,
            'plan_title' => 'タイトル',
            'plan_explanation' => 'タイトル説明',
            'plan_status' => 1,
            'amount' => 100,
        ];
        $validator = validator($data, $rules);
        $this->assertEquals($data['expected'], $validator->passes());
    }

    /**
     * プラン登録バリデーションテスト
     * NG
     * plan_idがnull
     */
    public function test_plan_update_request_plan_id_null()
    {
        $rules = (new PlanUpdateRequest())->rules();
        $data = [
            'expected' => false,
            'plan_id' => null,
            'user_id' => 1,
            'tag_id' => 1,
            'plan_title' => 'タイトル',
            'plan_explanation' => 'タイトル説明',
            'plan_status' => 1,
            'amount' => 100,
        ];
        $validator = validator($data, $rules);
        $this->assertEquals($data['expected'], $validator->passes());
    }

    /**
     * プラン登録バリデーションテスト
     * NG
     * plan_idが数字以外
     */
    public function test_plan_request_update_plan_id_not_integer()
    {
        $rules = (new PlanUpdateRequest())->rules();
        $data = [
            'expected' => false,
            'plan_id' => 'あ',
            'user_id' => 1,
            'tag_id' => 1,
            'plan_title' => 'タイトル',
            'plan_explanation' => 'タイトル説明',
            'plan_status' => 1,
            'amount' => 100,
        ];
        $validator = validator($data, $rules);
        $this->assertEquals($data['expected'], $validator->passes());
    }

    /**
     * プラン登録バリデーションテスト
     * NG
     * user_idがnull
     */
    public function test_plan_update_request_user_id_null()
    {
        $rules = (new PlanUpdateRequest())->rules();
        $data = [
            'expected' => false,
            'plan_id' => 1,
            'user_id' => null,
            'tag_id' => 1,
            'plan_title' => 'タイトル',
            'plan_explanation' => 'タイトル説明',
            'plan_status' => 1,
            'amount' => 100,
        ];
        $validator = validator($data, $rules);
        $this->assertEquals($data['expected'], $validator->passes());
    }

    /**
     * プラン登録バリデーションテスト
     * NG
     * user_idが数字以外
     */
    public function test_plan_request_update_user_id_not_integer()
    {
        $rules = (new PlanUpdateRequest())->rules();
        $data = [
            'expected' => false,
            'plan_id' => 1,
            'user_id' => 'あ',
            'tag_id' => 1,
            'plan_title' => 'タイトル',
            'plan_explanation' => 'タイトル説明',
            'plan_status' => 1,
            'amount' => 100,
        ];
        $validator = validator($data, $rules);
        $this->assertEquals($data['expected'], $validator->passes());
    }

    /**
     * プラン登録バリデーションテスト
     * NG
     * tag_idがnull
     */
    public function test_plan_update_request_tag_id_null()
    {
        $rules = (new PlanUpdateRequest())->rules();
        $data = [
            'expected' => false,
            'plan_id' => 1,
            'user_id' => 1,
            'tag_id' => null,
            'plan_title' => 'タイトル',
            'plan_explanation' => 'タイトル説明',
            'plan_status' => 1,
            'amount' => 100,
        ];
        $validator = validator($data, $rules);
        $this->assertEquals($data['expected'], $validator->passes());
    }

    /**
     * プラン登録バリデーションテスト
     * NG
     * tag_idが数字以外
     */
    public function test_plan_request_update_tag_id_not_integer()
    {
        $rules = (new PlanUpdateRequest())->rules();
        $data = [
            'expected' => false,
            'plan_id' => 1,
            'user_id' => 1,
            'tag_id' => 'あ',
            'plan_title' => 'タイトル',
            'plan_explanation' => 'タイトル説明',
            'plan_status' => 1,
            'amount' => 100,
        ];
        $validator = validator($data, $rules);
        $this->assertEquals($data['expected'], $validator->passes());
    }

    /**
     * プラン登録バリデーションテスト
     * NG
     * plan_titleがnull
     */
    public function test_plan_request_update_plan_title_null()
    {
        $rules = (new PlanUpdateRequest())->rules();
        $data = [
            'expected' => false,
            'plan_id' => 1,
            'user_id' => 1,
            'tag_id' => 1,
            'plan_title' => null,
            'plan_explanation' => 'タイトル説明',
            'plan_status' => 1,
            'amount' => 100,
        ];
        $validator = validator($data, $rules);
        $this->assertEquals($data['expected'], $validator->passes());
    }

    /**
     * プラン登録バリデーションテスト
     * NG
     * plan_titleが文字列以外
     */
    public function test_plan_request_update_plan_title_not_string()
    {
        $rules = (new PlanUpdateRequest())->rules();
        $data = [
            'expected' => false,
            'plan_id' => 1,
            'user_id' => 1,
            'tag_id' => 1,
            'plan_title' => 1,
            'plan_explanation' => 'タイトル説明',
            'plan_status' => 1,
            'amount' => 100,
        ];
        $validator = validator($data, $rules);
        $this->assertEquals($data['expected'], $validator->passes());
    }

    /**
     * プラン登録バリデーションテスト
     * NG
     * plan_titleが50文字以上
     */
    public function test_plan_request_update_plan_title_not_max_50()
    {
        $rules = (new PlanUpdateRequest())->rules();
        $data = [
            'expected' => false,
            'plan_id' => 1,
            'user_id' => 1,
            'tag_id' => 1,
            'plan_title' => 'プランタイトルです。プランタイトルです。プランタイトルです。プランタイトルです。プランタイトルです。プ',
            'plan_explanation' => 'タイトル説明',
            'plan_status' => 1,
            'amount' => 100,
        ];
        $validator = validator($data, $rules);
        $this->assertEquals($data['expected'], $validator->passes());
    }

    /**
     * プラン登録バリデーションテスト
     * NG
     * plan_explanationがnull
     */
    public function test_plan_request_update_plan_explanation_null()
    {
        $rules = (new PlanUpdateRequest())->rules();
        $data = [
            'expected' => false,
            'plan_id' => 1,
            'user_id' => 1,
            'tag_id' => 1,
            'plan_title' => 'プランタイトル',
            'plan_explanation' => null,
            'plan_status' => 1,
            'amount' => 100,
        ];
        $validator = validator($data, $rules);
        $this->assertEquals($data['expected'], $validator->passes());
    }

    /**
     * プラン登録バリデーションテスト
     * NG
     * plan_explanationが文字列以外
     */
    public function test_plan_request_update_plan_explanation_not_string()
    {
        $rules = (new PlanUpdateRequest())->rules();
        $data = [
            'expected' => false,
            'plan_id' => 1,
            'user_id' => 1,
            'tag_id' => 1,
            'plan_title' => 'プランタイトルです。プランタイトルです。プランタイトルです。プランタイトルです。プランタイトルです。プ',
            'plan_explanation' => 1,
            'plan_status' => 1,
            'amount' => 100,
        ];
        $validator = validator($data, $rules);
        $this->assertEquals($data['expected'], $validator->passes());
    }

    /**
     * プラン登録バリデーションテスト
     * NG
     * plan_statusがnull
     */
    public function test_plan_request_update_plan_status_null()
    {
        $rules = (new PlanUpdateRequest())->rules();
        $data = [
            'expected' => false,
            'plan_id' => 1,
            'user_id' => 1,
            'tag_id' => 1,
            'plan_title' => 'プランタイトルです。プランタイトルです。プランタイトルです。プランタイトルです。プランタイトルです。プ',
            'plan_explanation' => 'タイトル説明',
            'plan_status' => null,
            'amount' => 100,
        ];
        $validator = validator($data, $rules);
        $this->assertEquals($data['expected'], $validator->passes());
    }

    /**
     * プラン登録バリデーションテスト
     * NG
     * plan_statusが数字以外
     */
    public function test_plan_request_update_plan_status_not_integer()
    {
        $rules = (new PlanUpdateRequest())->rules();
        $data = [
            'expected' => false,
            'plan_id' => 1,
            'user_id' => 1,
            'tag_id' => 1,
            'plan_title' => 'プランタイトルです。プランタイトルです。プランタイトルです。プランタイトルです。プランタイトルです。プ',
            'plan_explanation' => 'タイトル説明',
            'plan_status' => 'あ',
            'amount' => 100,
        ];
        $validator = validator($data, $rules);
        $this->assertEquals($data['expected'], $validator->passes());
    }

    /**
     * プラン登録バリデーションテスト
     * NG
     * amountがnull
     */
    public function test_plan_request_update_amount_null()
    {
        $rules = (new PlanUpdateRequest())->rules();
        $data = [
            'expected' => false,
            'plan_id' => 1,
            'user_id' => 1,
            'tag_id' => 1,
            'plan_title' => 'プランタイトルです。プランタイトルです。プランタイトルです。プランタイトルです。プランタイトルです。プ',
            'plan_explanation' => 'タイトル説明',
            'plan_status' => null,
            'amount' => null,
        ];
        $validator = validator($data, $rules);
        $this->assertEquals($data['expected'], $validator->passes());
    }

    /**
     * プラン登録バリデーションテスト
     * NG
     * amountが数字以外
     */
    public function test_plan_request_update_amount_not_integer()
    {
        $rules = (new PlanUpdateRequest())->rules();
        $data = [
            'expected' => false,
            'plan_id' => 1,
            'user_id' => 1,
            'tag_id' => 1,
            'plan_title' => 'プランタイトルです。プランタイトルです。プランタイトルです。プランタイトルです。プランタイトルです。プ',
            'plan_explanation' => 'タイトル説明',
            'plan_status' => 1,
            'amount' => 'あ',
        ];
        $validator = validator($data, $rules);
        $this->assertEquals($data['expected'], $validator->passes());
    }
}
