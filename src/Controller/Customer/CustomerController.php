<?php

namespace App\Controller\Customer;

use Api\Controller\AbstractController;
use App\Entity\Customer\Customer;

use App\Entity\Customer\CustomerInterface;
use App\Service\Customer\CustomerService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Swagger\Annotations as SWG;
use Nelmio\ApiDocBundle\Annotation\Model;

/**
 * Class InvoiceController
 * @package App\Controller\Billing\Invoice
 *
 * @Route("/api/customers")
 * @SWG\Tag(name="Customer")
 */
class CustomerController extends AbstractController
{
    /**
     * @var CustomerService
     */
    private $customerService;

    /**
     * CustomerController constructor.
     * @param CustomerService $customerService
     */
    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    /**
     * Retrieves the collection of Customer resources.
     *
     * @Route(methods={"GET"})
     *
     * @SWG\Response(
     *     response="200",
     *     description="Customer collection response",
     *     @SWG\Schema(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=Customer::class, groups={"read", "customer-read"}))
     *     )
     * )
     *
     */
    public function cget()
    {

    }

    /**
     * Creates an Customer resource.
     *
     * @Route(methods={"POST"})
     *
     * @SWG\Parameter(
     *     name="customer",
     *     in="body",
     *     @Model(type=Customer::class, groups={"write", "customer-write"})
     * )
     *
     * @SWG\Response(
     *     response="201",
     *     description="Customer resource created",
     *     @Model(type=Customer::class, groups={"read", "customer-read"})
     * )
     *
     * @SWG\Response(
     *     response="400",
     *     description="Invalid input"
     * )
     *
     * @param Request $request
     * @return CustomerInterface
     */
    public function post(Request $request): CustomerInterface
    {
        $customer = $request->request->get('customer');
        if (!$customer instanceof CustomerInterface) {
            throw new NotFoundHttpException();
        }

        $this->setResponseSerializationGroups(["read", "customer-read"]);

        return $this->customerService->post($customer);
    }

    /**
     * Retrieves an Customer resource.
     *
     * @Route(path="/{id}", methods={"GET"})
     *
     * @SWG\Response(
     *     response="200",
     *     description="Customer resource response",
     *     @Model(type=Customer::class, groups={"read", "customer-read"})
     * )
     *
     * @SWG\Response(
     *     response="404",
     *     description="Resource not found"
     * )
     *
     * @param Customer $customer
     * @return Customer
     */
    public function show(Customer $customer = null): CustomerInterface
    {
        if (!$customer instanceof CustomerInterface) {
            throw new NotFoundHttpException("Customer not found");
        }
        $this->setResponseSerializationGroups(["read", "customer-read"]);

        return $customer;
    }

    /**
     * Replaces the Customer resource.
     *
     * @Route(path="/{id}", methods={"PUT"})
     *
     * @SWG\Response(
     *     response="200",
     *     description="Customer resource updated",
     *     @Model(type=Customer::class, groups={"read", "customer-read"})
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
     * Updates the Customer resource.
     *
     * @Route(path="/{id}", methods={"PATCH"})
     *
     * @SWG\Response(
     *     response="200",
     *     description="Customer resource updated",
     *     @Model(type=Customer::class, groups={"read", "customer-read"})
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
     * Removes the Customer resource..
     *
     * @Route(path="/{id}", methods={"DELETE"})
     *
     * @SWG\Response(
     *     response="204",
     *     description="Customer resource deleted"
     * )
     *
     * @SWG\Response(
     *     response="404",
     *     description="Resource not found"
     * )
     *
     * @param Customer|null $customer
     */
    public function delete(Customer $customer = null)
    {
        if (!$customer instanceof CustomerInterface) {
            throw new NotFoundHttpException("Customer not found");
        }

        $this->customerService->delete($customer);
    }
}