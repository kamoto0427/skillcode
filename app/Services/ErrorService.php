<?php

namespace App\Services;

class ErrorService
{
  /**
   * エラーを投げる処理
   *
   * @param $status_code ステータスコード
   * @param $message エラーメッセージ
   * @return エラーレスポンス
   */
  public function abort($status_code, $message)
  {
    return abort(response()->json([
      'error' => [
          'code' => $status_code,
          'message' => $message
        ]
    ], $status_code));
  }
}
