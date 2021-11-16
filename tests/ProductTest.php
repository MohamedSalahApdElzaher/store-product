<?php

class ProductTest extends \App\Tests\DatabaseDependentTestCase
{

  /** @test */
    public function a_product_can_be_created()
    {
         $name = "Speakers models";
         $description = "this is a good model for speakers...";

         $product = new Product();

         $product->setName($name);
         $product->setDescription($description);
        $product->setPrice(123);

         $this->entitymanger->persist($product);
         $this->entitymanger->flush();

         $this->assertSame(1, $product->getId());
    }

    /** @test */
    public function duplicate_check_refresh_schema()
    {
        $name = "Speakers models";
        $description = "this is a good model for speakers...";

        $product = new Product();

        $product->setName($name);
        $product->setDescription($description);
        $product->setPrice(123);

        $this->entitymanger->persist($product);
        $this->entitymanger->flush();

        $this->assertSame(1, $product->getId());
    }

}