<?php

/*
 * This file is part of the overtrue/wechat.
 *
 * (c) overtrue <i@overtrue.me>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace EasyWeChat\MiniProgram\StoreCoupon;

use EasyWeChat\Kernel\BaseClient;

class Client extends BaseClient
{
    const STATUS_DRAFT = 1;
    const STATUS_AVAILABLE = 2;
    const STATUS_EXPIRED = 3;
    const STATUS_BAN = 4;
    const STATUS_DELETED = 5;

    /**
     * @param string $openid
     * @param int $couponId
     *
     * @return \Psr\Http\Message\ResponseInterface|\EasyWeChat\Kernel\Support\Collection|array|object|string
     *
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function push($openid, $couponId)
    {
        $params = [
            'openid' => $openid,
            'coupon_id' => $couponId,
        ];
        return $this->httpPostJson('product/coupon/push', $params);
    }

    /**
     * @param string $startCreateTime
     * @param string $endCreateTime
     * @param int $status
     * @param int $page
     * @param int $pageSize
     *
     * @return \Psr\Http\Message\ResponseInterface|\EasyWeChat\Kernel\Support\Collection|array|object|string
     *
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getList($startCreateTime, $endCreateTime, $status, $page, $pageSize)
    {
        $params = [
            'start_create_time' => $startCreateTime,
            'end_create_time' => $endCreateTime,
            'status' => $status,
            'page' => $page,
            'page_size' => $pageSize,
        ];
        return $this->httpPostJson('product/coupon/get_list', $params);
    }

    /**
     * 
     *
     * @param mixed $id
     * 
     * @return \Psr\Http\Message\ResponseInterface|\EasyWeChat\Kernel\Support\Collection|array|object|string
     *
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get($id)
    {
        return $this->httpPostJson('product/coupon/get', [
            'coupon_id' => intval($id),
        ]);
    }
}
