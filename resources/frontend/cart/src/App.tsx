import { QueryClient, QueryClientProvider } from "react-query";
import './App.css'
import ShoppingCart from './shoppingCart'

const queryClient = new QueryClient()

function App() {
  return (
    <div className="App">
        <QueryClientProvider client={queryClient}>
            <ShoppingCart />
        </QueryClientProvider>
    </div>
  )
}

export default App
