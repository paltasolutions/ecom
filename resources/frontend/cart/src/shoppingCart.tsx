import Button from "./atom/button"
import CartHeader from "./atom/cartHeader"
import CloseCartButton from "./atom/closeCartButton"
import List from "./molecules/list"

const items = [{
    color: 'Salmon',
    description: 'Salmon orange fabric pouch with match zipper, gray zipper pull, and adjustable hip belt.',
    image: 'https://tailwindui.com/img/ecommerce-images/shopping-cart-page-04-product-01.jpg',
    name: 'Throwback Hip Bag',
    price: '$90.00',
    quantity: 1
}, {
    color: 'Blue',
    description: 'Front of satchel with blue canvas body, black straps and handle, drawstring top, and front zipper pouch.',
    image: 'https://tailwindui.com/img/ecommerce-images/shopping-cart-page-04-product-02.jpg',
    name: 'Medium Stuff Satchel',
    price: '$32.00',
    quantity: 1
}]

function ShoppingCart() {
    return (
        <div className="fixed inset-0 overflow-hidden" aria-labelledby="slide-over-title" role="dialog" aria-modal="true">
            <div className="absolute inset-0 overflow-hidden">
                {/* <!--
                Background overlay, show/hide based on slide-over state.

                Entering: "ease-in-out duration-500"
                    From: "opacity-0"
                    To: "opacity-100"
                Leaving: "ease-in-out duration-500"
                    From: "opacity-100"
                    To: "opacity-0"
                --> */}
                <div className="absolute inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

                <div className="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10">
                    {/* <!--
                        Slide-over panel, show/hide based on slide-over state.

                        Entering: "transform transition ease-in-out duration-500 sm:duration-700"
                        From: "translate-x-full"
                        To: "translate-x-0"
                        Leaving: "transform transition ease-in-out duration-500 sm:duration-700"
                        From: "translate-x-0"
                        To: "translate-x-full"
                    --> */}
                    <div className="pointer-events-auto w-screen max-w-md">
                        <div className="flex h-full flex-col overflow-y-scroll bg-white shadow-xl">
                            <div className="flex-1 overflow-y-auto py-6 px-4 sm:px-6">
                                <div className="flex items-start justify-between">
                                    <CartHeader />
                                    <div className="ml-3 flex h-7 items-center">
                                        <CloseCartButton />
                                    </div>
                                </div>
                                <List items={items} />
                            </div>

                            <div className="border-t border-gray-200 py-6 px-4 sm:px-6">
                                <div className="flex justify-between text-base font-medium text-gray-900">
                                    <p>Subtotal</p>
                                    <p>$262.00</p>
                                </div>
                                <p className="mt-0.5 text-sm text-gray-500">Shipping and taxes calculated at checkout.</p>
                                <div className="mt-6">
                                    <a href="#" className="flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-indigo-700">Checkout</a>
                                </div>
                                <div className="mt-6 flex justify-center text-center text-sm text-gray-500">
                                    <p>
                                        or <Button>Continue Shopping<span aria-hidden="true"> &rarr;</span></Button>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    )
}

export default ShoppingCart
