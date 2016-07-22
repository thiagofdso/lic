<?php

namespace CodeDelivery\Presenters;

use CodeDelivery\Transformers\ClientUserTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class UserPresenter
 *
 * @package namespace CodeDelivery\Presenters;
 */
class ClientUserPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ClientUserTransformer();
    }
}
