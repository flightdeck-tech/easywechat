<?php

/*
 * This file is part of the overtrue/wechat.
 *
 * (c) overtrue <i@overtrue.me>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace EasyWeChat\MiniProgram\StoreSku;

use EasyWeChat\Kernel\BaseClient;

class Client extends BaseClient
{
    /**
     * @param int $productId
     * @param bool $needEdit
     * @param bool $needRealStock
     *
     * @return \Psr\Http\Message\ResponseInterface|\EasyWeChat\Kernel\Support\Collection|array|object|string
     *
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getList($productId, $needEdit = false, $needRealStock = true)
    {
        $params = [
            'product_id' => $productId,
            'need_edit_sku' => $needEdit ? 1 : 0,
            'need_real_stock' => $needRealStock ? 1 : 0,
        ];
        return $this->httpPostJson('product/sku/get_list', $params);
    }

    /**
     * 
     *
     * @param string $productId
     * @param string $skuId
     * @param int $stock
     * @param bool $fullUpdate
     * 
     * @return \Psr\Http\Message\ResponseInterface|\EasyWeChat\Kernel\Support\Collection|array|object|string
     *
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function updateStock($productId, $skuId, $stock, $fullUpdate = true)
    {
        return $this->httpPostJson('product/stock/update', [
            'product_id' => $productId,
            'sku_id' => $skuId,
            'type' => $fullUpdate ? 1 : 0,
            'stock_num' => $stock
        ]);
    }

}
