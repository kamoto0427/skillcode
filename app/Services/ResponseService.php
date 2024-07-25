<?php

namespace App\Services;

class ResponseService
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

  /**
   * 正常系レスポンス
   *
   * @param $status ステータスコード
   * @param $message 成功メッセージ
   */
  public function status200($message)
  {
    return abort(response()->json([
          'status' => 200,
          'message' => $message
    ], 200));
  }
}
