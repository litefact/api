<?php

namespace App\Controller\Billing\Invoice;

use App\Entity\Billing\Invoice\Invoice;

use Nelmio\ApiDocBundle\Annotation\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Swagger\Annotations as SWG;
use Nelmio\ApiDocBundle\Annotation\Model;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * Class InvoiceController
 * @package App\Controller\Billing\Invoice
 *
 * @Route("/api/billing/invoices")
 * @SWG\Tag(name="Billing / Invoice")
 */
class InvoiceController extends AbstractController
{
    /**
     * Retrieves the collection of Invoice resources.
     *
     * @Route(methods={"GET"})
     *
     * @SWG\Response(
     *     response="200",
     *     description="Invoice collection response",
     *     @SWG\Schema(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=Invoice::class, groups={"read", "billing-read"}))
     *     )
     * )
     *
     */
    public function cget()
    {

    }

    /**
     * Creates an Invoice resource.
     *
     * @Route(methods={"POST"})
     *
     * @SWG\Parameter(
     *     name="body",
     *     in="body",
     *     @Model(type=Invoice::class, groups={"write", "billing-write"})
     * )
     *
     * @SWG\Response(
     *     response="200",
     *     description="Invoice resource created",
     *     @Model(type=Invoice::class, groups={"read", "billing-read"})
     * )
     *
     * @SWG\Response(
     *     response="400",
     *     description="Invalid input"
     * )
     *
     */
    public function post(Request $request)
    {

    }

    /**
     * Retrieves an Invoice resource.
     *
     * @Route(path="/{id}", methods={"GET"})
     *
     * @SWG\Response(
     *     response="200",
     *     description="Invoice resource response",
     *     @Model(type=Invoice::class, groups={"read", "billing-read"})
     * )
     *
     * @SWG\Response(
     *     response="404",
     *     description="Resource not found"
     * )
     *
     */
    public function show()
    {

    }

    /**
     * Replaces the Invoice resource.
     *
     * @Route(path="/{id}", methods={"PUT"})
     *
     * @SWG\Response(
     *     response="200",
     *     description="Invoice resource updated",
     *     @Model(type=Invoice::class, groups={"read", "billing-read"})
     * )
     *
     * @SWG\Response(
     *     response="400",
     *     description="Invalid input"
     * )
     *
     * @SWG\Response(
     *     response="404",
     *     description="Resource not found"
     * )
     *
     */
    public function put()
    {

    }

    /**
     * Updates the Invoice resource.
     *
     * @Route(path="/{id}", methods={"PATCH"})
     *
     * @SWG\Response(
     *     response="200",
     *     description="Invoice resource updated",
     *     @Model(type=Invoice::class, groups={"read", "billing-read"})
     * )
     *
     * @SWG\Response(
     *     response="400",
     *     description="Invalid input"
     * )
     *
     * @SWG\Response(
     *     response="404",
     *     description="Resource not found"
     * )
     *
     */
    public function patch()
    {

    }

    /**
     * Removes the Invoice resource..
     *
     * @Route(path="/{id}", methods={"DELETE"})
     *
     * @SWG\Response(
     *     response="204",
     *     description="Invoice resource deleted"
     * )
     *
     * @SWG\Response(
     *     response="404",
     *     description="Resource not found"
     * )
     *
     */
    public function delete()
    {

    }
}