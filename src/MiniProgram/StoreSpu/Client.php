<?php

/*
 * This file is part of the overtrue/wechat.
 *
 * (c) overtrue <i@overtrue.me>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace EasyWeChat\MiniProgram\StoreSpu;

use EasyWeChat\Kernel\BaseClient;

class Client extends BaseClient
{
    const STATUS_INIT = 0;
    const STATUS_ONLINE = 5;
    const STATUS_RECYCLE = 6;
    const STATUS_LOGICAL_DELETE = 9;
    const STATUS_OFFLINE_MANUAL = 11;
    const STATUS_OFFLINE_SOLD_OUT = 12;
    const STATUS_OFFLINE_ILLEGAL = 13;

    /**
     * @param int $status
     * @param int $page
     * @param int $pageSize
     * @param bool $needEdit
     *
     * @return \Psr\Http\Message\ResponseInterface|\EasyWeChat\Kernel\Support\Collection|array|object|string
     *
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getList($status, $page, $pageSize, $needEdit = false)
    {
        $params = [
            'status' => $status,
            'page' => $page,
            'page_size' => $pageSize,
            'need_edit_spu' => $needEdit ? 1 : 0,
        ];
        return $this->httpPostJson('product/spu/get_list', $params);
    }

    /**
     * @param string $keyword
     * @param int $source
     * @param int $page
     * @param int $pageSize
     *
     * @return \Psr\Http\Message\ResponseInterface|\EasyWeChat\Kernel\Support\Collection|array|object|string
     *
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function search($keyword, $source, $page, $pageSize)
    {
        $params = [
            'keyword' => $keyword,
            'source' => $source,
            'page' => $page,
            'page_size' => $pageSize,
        ];
        return $this->httpPostJson('product/spu/search', $params);
    }

    /**
     * 
     *
     * @param string $productId
     * 
     * @return \Psr\Http\Message\ResponseInterface|\EasyWeChat\Kernel\Support\Collection|array|object|string
     *
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function listing($productId)
    {
        return $this->httpPostJson('product/spu/listing', [
            'product_id' => $productId,
        ]);
    }
}
