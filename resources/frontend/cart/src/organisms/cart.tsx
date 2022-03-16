import Button from "../atom/button"
import CartHeader from "../atom/cartHeader"
import CloseCartButton from "../atom/closeCartButton"
import List from "../molecules/list"
import graphqlRequestClient from '../graphqlRequestClient'
import {useCartQuery} from '../generated'


function Cart() {
    const { status, data: cart, error, isFetching } = useCartQuery(graphqlRequestClient, {
        id: '0be5b974-c735-3bb3-965c-9e8ec944bb15'
    })

    if (isFetching) {
        return null
    }

    return (
        <div className="flex h-full flex-col overflow-y-scroll bg-white shadow-xl">
            <div className="flex-1 overflow-y-auto py-6 px-4 sm:px-6">
                <div className="flex items-start justify-between">
                    <CartHeader />
                    <div className="ml-3 flex h-7 items-center">
                        <CloseCartButton />
                    </div>
                </div>
                <List items={cart?.cart?.items} />
            </div>

            <div className="border-t border-gray-200 py-6 px-4 sm:px-6">
                <div className="flex justify-between text-base font-medium text-gray-900">
                    <p>Subtotal</p>
                    <p>{cart?.cart?.sub_total.formatted}</p>
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
    )
}

export default Cart
