<?php
/**
 * ProductQuantization
 *
 * @since     Oct 2023
 * @author    Haydar KULEKCI <haydarkulekci@gmail.com>
 */

namespace Qdrant\Models\Request\CollectionConfig;

class ProductQuantization implements QuantizationConfig
{
    /**
     * @var string
     */
    protected $compression;

    /**
     * @var bool|null
     */
    protected $alwaysRam;

    public function __construct(string $compression, ?bool $alwaysRam = null)
    {
        $this->compression = $compression;
        $this->alwaysRam = $alwaysRam;
    }

    public function toArray(): array
    {
        $product = [
            'compression' => $this->compression
        ];

        if ($this->alwaysRam !== null) {
            $product['always_ram'] = $this->alwaysRam;
        }

        return [
            'product' => $product
        ];
    }
}