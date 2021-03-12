<?php

/*
 * This file is part of the overtrue/wechat.
 *
 * (c) overtrue <i@overtrue.me>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace EasyWeChat\MiniProgram\Store;

use EasyWeChat\Kernel\BaseClient;

class Client extends BaseClient
{

    /**
     *
     * @return \Psr\Http\Message\ResponseInterface|\EasyWeChat\Kernel\Support\Collection|array|object|string
     *
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getShopcat()
    {
        return $this->httpPostJson('product/store/get_shopcat', []);
    }

    /**
     * @param int $parentCatId
     *
     * @return \Psr\Http\Message\ResponseInterface|\EasyWeChat\Kernel\Support\Collection|array|object|string
     *
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getCategory($parentCatId = 0)
    {
        return $this->httpPostJson('product/category/get', ['f_cat_id' => $parentCatId]);
    }

    /**
     *
     * @return \Psr\Http\Message\ResponseInterface|\EasyWeChat\Kernel\Support\Collection|array|object|string
     *
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getBrand()
    {
        return $this->httpPostJson('product/brand/get', []);
    }

    public function getDeliveryCompanyList()
    {
        return $this->httpPostJson('product/delivery/get_company_list', []);
    }
}
