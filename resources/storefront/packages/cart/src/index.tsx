import React from 'react'
import ReactDOM from 'react-dom'
import Cart from './cart'
import DingDong from './dingdong'

export { Cart, DingDong }

ReactDOM.render(
  <React.StrictMode>
    <Cart />
  </React.StrictMode>,
  document.getElementById('root')
)
