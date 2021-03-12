<?php

/*
 * This file is part of the overtrue/wechat.
 *
 * (c) overtrue <i@overtrue.me>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace EasyWeChat\MiniProgram\StoreOrder;

use EasyWeChat\Kernel\BaseClient;

class Client extends BaseClient
{

    /**
     * @param string $startUpdateTime
     * @param string $endUpdateTime
     * @param int $status
     * @param int $page
     * @param int $pageSize
     *
     * @return \Psr\Http\Message\ResponseInterface|\EasyWeChat\Kernel\Support\Collection|array|object|string
     *
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getListByUpdateTime($startUpdateTime, $endUpdateTime, $status, $page, $pageSize)
    {
        return $this->getList([
            'start_update_time' => $startUpdateTime,
            'end_update_time' => $endUpdateTime,
            'status' => $status,
            'page' => $page,
            'page_size' => $pageSize,
        ]);
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
    public function getListByCreateTime($startCreateTime, $endCreateTime, $status, $page, $pageSize)
    {
        return $this->getList([
            'start_create_time' => $startCreateTime,
            'end_create_time' => $endCreateTime,
            'status' => $status,
            'page' => $page,
            'page_size' => $pageSize,
        ]);
    }

    /**
     * @param array $params
     *
     * @return \Psr\Http\Message\ResponseInterface|\EasyWeChat\Kernel\Support\Collection|array|object|string
     *
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    protected function getList($params)
    {
        return $this->httpPostJson('product/order/get_list', $params);
    }

    /**
     * @param int $orderId
     *
     * @return \Psr\Http\Message\ResponseInterface|\EasyWeChat\Kernel\Support\Collection|array|object|string
     *
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get($orderId)
    {
        return $this->httpPostJson('product/order/get', [
            'order_id' => $orderId,
        ]);
    }

    /**
     *
     *
     * @param int $orderId
     * @param array $deliveryList
     *
     * @return \Psr\Http\Message\ResponseInterface|\EasyWeChat\Kernel\Support\Collection|array|object|string
     *
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function send($orderId, $deliveryList)
    {
        $params = [
            'order_id' => $orderId,
            'delivery_list' => $deliveryList,
        ];
        return $this->httpPostJson('product/delivery/send', $params);
    }

    /**
     *
     *
     * @param array $params
     * @param int $size
     * @param int $page
     *
     * @return \Psr\Http\Message\ResponseInterface|\EasyWeChat\Kernel\Support\Collection|array|object|string
     *
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function search($params, $size, $page)
    {
        $params['page_size'] = $size;
        $params['page'] = $page;
        return $this->httpPostJson('product/order/search', $params);
    }
}
