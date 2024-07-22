<?php

namespace App\Services;

class PlanServices
{
  /**
   * 金額を整形する
   * 例)1000→¥1,000
   *
   * @param int $amount 整形前の金額
   * @return int 整形後の金額
   */
  public function convertAmount($amount)
  {
    $convert_amount = "¥" . number_format($amount);
    return $convert_amount;
  }

  /**
   * プランステータスを整形する
   * 例)1=教える、2=学ぶに変換
   *
   * @param int $plan_status 整形前のプランステータス
   * @return string 変換した後のプランステータス
   */
  public function convertPlanStatus($plan_status)
  {
    switch ($plan_status) {
      case 1:
        $convert_plan_status = '教える';
        break;
        case 2:
          $convert_plan_status = '学ぶ';
          break;
          default:
          $convert_plan_status = '';
          break;
    }
    return $convert_plan_status;
  }

  /**
   * プラン評価を整形する
   * 例)3.5000→3.5※小数点第1位まで
   *
   * @param int $rating 整形前の評価
   * @return int 整形後の評価
   */
  public function convertPlanEvaluation($rating)
  {
    $convert_rating = floor($rating * 10) / 10;
    return $convert_rating;
  }
}