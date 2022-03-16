import Cart from "./organisms/cart"

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
                        <Cart />
                    </div>
                </div>
            </div>
        </div>
    )
}

export default ShoppingCart
