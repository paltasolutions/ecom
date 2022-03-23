import { GraphQLClient } from 'graphql-request';
import { RequestInit } from 'graphql-request/dist/types.dom';
import { useQuery, UseQueryOptions } from 'react-query';
export type Maybe<T> = T | null;
export type InputMaybe<T> = Maybe<T>;
export type Exact<T extends { [key: string]: unknown }> = { [K in keyof T]: T[K] };
export type MakeOptional<T, K extends keyof T> = Omit<T, K> & { [SubKey in K]?: Maybe<T[SubKey]> };
export type MakeMaybe<T, K extends keyof T> = Omit<T, K> & { [SubKey in K]: Maybe<T[SubKey]> };

function fetcher<TData, TVariables>(client: GraphQLClient, query: string, variables?: TVariables, headers?: RequestInit['headers']) {
  return async (): Promise<TData> => client.request<TData, TVariables>(query, variables, headers);
}
/** All built-in and custom scalars, mapped to their actual values */
export type Scalars = {
  ID: string;
  String: string;
  Boolean: boolean;
  Int: number;
  Float: number;
  /** A date string with format `Y-m-d`, e.g. `2011-05-23`. */
  Date: any;
  /** A datetime string with format `Y-m-d H: i: s`, e.g. `2018-05-23 13: 43: 32`. */
  DateTime: any;
  /** A datetime and timezone string in ISO 8601 format `Y-m-dTH:i:sO`, e.g. `2020-04-20T13:53:12+02:00`. */
  DateTimeTz: any;
};

export type AddToCartInput = {
  cart_id: Scalars['String'];
  currency?: InputMaybe<CurrencyInput>;
  description?: InputMaybe<Scalars['String']>;
  id?: InputMaybe<Scalars['String']>;
  name?: InputMaybe<Scalars['String']>;
  quantity?: InputMaybe<Scalars['Int']>;
  type?: InputMaybe<CartItemType>;
  unit_total_amount: Scalars['Int'];
};

export type Cart = {
  __typename?: 'Cart';
  abandoned?: Maybe<Scalars['Boolean']>;
  created_at: Scalars['Date'];
  currency: Currency;
  email?: Maybe<Scalars['String']>;
  grand_total: Money;
  id: Scalars['String'];
  is_empty?: Maybe<Scalars['Boolean']>;
  items: Array<CartItem>;
  notes?: Maybe<Scalars['String']>;
  shipping_total: Money;
  sub_total: Money;
  tax_total: Money;
  total_items?: Maybe<Scalars['Int']>;
  total_unique_items?: Maybe<Scalars['Int']>;
  updated_at: Scalars['Date'];
};

export type CartItem = {
  __typename?: 'CartItem';
  created_at: Scalars['Date'];
  description?: Maybe<Scalars['String']>;
  id: Scalars['String'];
  image?: Maybe<Image>;
  line_total: Money;
  name?: Maybe<Scalars['String']>;
  quantity: Scalars['Int'];
  sub_total: Money;
  type: CartItemType;
  unit_total: Money;
  updated_at: Scalars['Date'];
};

export enum CartItemType {
  Shipping = 'SHIPPING',
  Sku = 'SKU',
  Tax = 'TAX'
}

export type Currency = {
  __typename?: 'Currency';
  code?: Maybe<CurrencyCode>;
  decimal_separator?: Maybe<Scalars['String']>;
  decimals?: Maybe<Scalars['Int']>;
  symbol?: Maybe<Scalars['String']>;
  thousands_separator?: Maybe<Scalars['String']>;
};

export enum CurrencyCode {
  Aed = 'AED',
  Afn = 'AFN',
  All = 'ALL',
  Amd = 'AMD',
  Ang = 'ANG',
  Aoa = 'AOA',
  Ars = 'ARS',
  Aud = 'AUD',
  Awg = 'AWG',
  Azn = 'AZN',
  Bam = 'BAM',
  Bbd = 'BBD',
  Bdt = 'BDT',
  Bgn = 'BGN',
  Bhd = 'BHD',
  Bif = 'BIF',
  Bmd = 'BMD',
  Bnd = 'BND',
  Bob = 'BOB',
  Brl = 'BRL',
  Bsd = 'BSD',
  Btc = 'BTC',
  Btn = 'BTN',
  Bwp = 'BWP',
  Byr = 'BYR',
  Bzd = 'BZD',
  Cad = 'CAD',
  Cdf = 'CDF',
  Chf = 'CHF',
  Clp = 'CLP',
  Cny = 'CNY',
  Cop = 'COP',
  Crc = 'CRC',
  Cuc = 'CUC',
  Cup = 'CUP',
  Cve = 'CVE',
  Czk = 'CZK',
  Djf = 'DJF',
  Dkk = 'DKK',
  Dop = 'DOP',
  Dzd = 'DZD',
  Egp = 'EGP',
  Ern = 'ERN',
  Etb = 'ETB',
  Eth = 'ETH',
  Eur = 'EUR',
  Fjd = 'FJD',
  Fkp = 'FKP',
  Gbp = 'GBP',
  Gel = 'GEL',
  Ghs = 'GHS',
  Gip = 'GIP',
  Gmd = 'GMD',
  Gnf = 'GNF',
  Gtq = 'GTQ',
  Gyd = 'GYD',
  Hkd = 'HKD',
  Hnl = 'HNL',
  Hrk = 'HRK',
  Htg = 'HTG',
  Huf = 'HUF',
  Idr = 'IDR',
  Ils = 'ILS',
  Inr = 'INR',
  Iqd = 'IQD',
  Irr = 'IRR',
  Isk = 'ISK',
  Jmd = 'JMD',
  Jod = 'JOD',
  Jpy = 'JPY',
  Kes = 'KES',
  Kgs = 'KGS',
  Khr = 'KHR',
  Kmf = 'KMF',
  Kpw = 'KPW',
  Krw = 'KRW',
  Kwd = 'KWD',
  Kyd = 'KYD',
  Kzt = 'KZT',
  Lak = 'LAK',
  Lbp = 'LBP',
  Lkr = 'LKR',
  Lrd = 'LRD',
  Lsl = 'LSL',
  Lyd = 'LYD',
  Mad = 'MAD',
  Mdl = 'MDL',
  Mga = 'MGA',
  Mkd = 'MKD',
  Mmk = 'MMK',
  Mnt = 'MNT',
  Mop = 'MOP',
  Mro = 'MRO',
  Mtl = 'MTL',
  Mur = 'MUR',
  Mvr = 'MVR',
  Mwk = 'MWK',
  Mxn = 'MXN',
  Myr = 'MYR',
  Mzn = 'MZN',
  Nad = 'NAD',
  Ngn = 'NGN',
  Nio = 'NIO',
  Nok = 'NOK',
  Npr = 'NPR',
  Nzd = 'NZD',
  Omr = 'OMR',
  Pab = 'PAB',
  Pen = 'PEN',
  Pgk = 'PGK',
  Php = 'PHP',
  Pkr = 'PKR',
  Pln = 'PLN',
  Pyg = 'PYG',
  Qar = 'QAR',
  Ron = 'RON',
  Rsd = 'RSD',
  Rub = 'RUB',
  Rwf = 'RWF',
  Sar = 'SAR',
  Sbd = 'SBD',
  Scr = 'SCR',
  Sdd = 'SDD',
  Sdg = 'SDG',
  Sek = 'SEK',
  Sgd = 'SGD',
  Shp = 'SHP',
  Sll = 'SLL',
  Sos = 'SOS',
  Srd = 'SRD',
  Std = 'STD',
  Svc = 'SVC',
  Syp = 'SYP',
  Szl = 'SZL',
  Thb = 'THB',
  Tjs = 'TJS',
  Tmt = 'TMT',
  Tnd = 'TND',
  Top = 'TOP',
  Try = 'TRY',
  Ttd = 'TTD',
  Tvd = 'TVD',
  Twd = 'TWD',
  Tzs = 'TZS',
  Uah = 'UAH',
  Ugx = 'UGX',
  Usd = 'USD',
  Uyu = 'UYU',
  Uzs = 'UZS',
  Veb = 'VEB',
  Vef = 'VEF',
  Vnd = 'VND',
  Vuv = 'VUV',
  Won = 'WON',
  Wst = 'WST',
  Xaf = 'XAF',
  Xbt = 'XBT',
  Xcd = 'XCD',
  Xof = 'XOF',
  Xpf = 'XPF',
  Yer = 'YER',
  Zar = 'ZAR',
  Zmw = 'ZMW'
}

export type CurrencyInput = {
  code?: InputMaybe<CurrencyCode>;
  decimal_separator?: InputMaybe<Scalars['String']>;
  decimals?: InputMaybe<Scalars['Int']>;
  symbol?: InputMaybe<Scalars['String']>;
  thousands_separator?: InputMaybe<Scalars['String']>;
};

export type CustomAttribute = {
  __typename?: 'CustomAttribute';
  key: Scalars['String'];
  value?: Maybe<Scalars['String']>;
};

export type CustomAttributeInput = {
  key: Scalars['String'];
  value?: InputMaybe<Scalars['String']>;
};

export type CustomCartAttribute = {
  __typename?: 'CustomCartAttribute';
  key: Scalars['String'];
  value?: Maybe<Scalars['String']>;
};

export type Image = {
  __typename?: 'Image';
  alt: Scalars['String'];
  id: Scalars['String'];
  src: Scalars['String'];
  title: Scalars['String'];
};

export type Money = {
  __typename?: 'Money';
  amount?: Maybe<Scalars['Int']>;
  currency: Currency;
  formatted: Scalars['String'];
};

export type Mutation = {
  __typename?: 'Mutation';
  addItemToCart?: Maybe<Cart>;
};


export type MutationAddItemToCartArgs = {
  input: AddToCartInput;
};

/** Allows ordering a list of records. */
export type OrderByClause = {
  /** The column that is used for ordering. */
  column: Scalars['String'];
  /** The direction that is used for ordering. */
  order: SortOrder;
};

/** Aggregate functions when ordering by a relation without specifying a column. */
export enum OrderByRelationAggregateFunction {
  /** Amount of items. */
  Count = 'COUNT'
}

/** Aggregate functions when ordering by a relation that may specify a column. */
export enum OrderByRelationWithColumnAggregateFunction {
  /** Average. */
  Avg = 'AVG',
  /** Amount of items. */
  Count = 'COUNT',
  /** Maximum. */
  Max = 'MAX',
  /** Minimum. */
  Min = 'MIN',
  /** Sum. */
  Sum = 'SUM'
}

/** Information about pagination using a Relay style cursor connection. */
export type PageInfo = {
  __typename?: 'PageInfo';
  /** Number of nodes in the current page. */
  count: Scalars['Int'];
  /** Index of the current page. */
  currentPage: Scalars['Int'];
  /** The cursor to continue paginating forwards. */
  endCursor?: Maybe<Scalars['String']>;
  /** When paginating forwards, are there more items? */
  hasNextPage: Scalars['Boolean'];
  /** When paginating backwards, are there more items? */
  hasPreviousPage: Scalars['Boolean'];
  /** Index of the last available page. */
  lastPage: Scalars['Int'];
  /** The cursor to continue paginating backwards. */
  startCursor?: Maybe<Scalars['String']>;
  /** Total number of nodes in the paginated connection. */
  total: Scalars['Int'];
};

/** Information about pagination using a fully featured paginator. */
export type PaginatorInfo = {
  __typename?: 'PaginatorInfo';
  /** Number of items in the current page. */
  count: Scalars['Int'];
  /** Index of the current page. */
  currentPage: Scalars['Int'];
  /** Index of the first item in the current page. */
  firstItem?: Maybe<Scalars['Int']>;
  /** Are there more pages after this one? */
  hasMorePages: Scalars['Boolean'];
  /** Index of the last item in the current page. */
  lastItem?: Maybe<Scalars['Int']>;
  /** Index of the last available page. */
  lastPage: Scalars['Int'];
  /** Number of items per page. */
  perPage: Scalars['Int'];
  /** Number of total available items. */
  total: Scalars['Int'];
};

export type Query = {
  __typename?: 'Query';
  cart?: Maybe<Cart>;
};


export type QueryCartArgs = {
  id: Scalars['String'];
};

/** Information about pagination using a simple paginator. */
export type SimplePaginatorInfo = {
  __typename?: 'SimplePaginatorInfo';
  /** Number of items in the current page. */
  count: Scalars['Int'];
  /** Index of the current page. */
  currentPage: Scalars['Int'];
  /** Index of the first item in the current page. */
  firstItem?: Maybe<Scalars['Int']>;
  /** Are there more pages after this one? */
  hasMorePages: Scalars['Boolean'];
  /** Index of the last item in the current page. */
  lastItem?: Maybe<Scalars['Int']>;
  /** Number of items per page. */
  perPage: Scalars['Int'];
};

/** Directions for ordering a list of records. */
export enum SortOrder {
  /** Sort records in ascending order. */
  Asc = 'ASC',
  /** Sort records in descending order. */
  Desc = 'DESC'
}

/** Specify if you want to include or exclude trashed results from a query. */
export enum Trashed {
  /** Only return trashed results. */
  Only = 'ONLY',
  /** Return both trashed and non-trashed results. */
  With = 'WITH',
  /** Only return non-trashed results. */
  Without = 'WITHOUT'
}

export type UpdateCartInput = {
  currency?: InputMaybe<CurrencyInput>;
  email?: InputMaybe<Scalars['String']>;
  id: Scalars['String'];
  notes?: InputMaybe<Scalars['String']>;
};

export type CartQueryVariables = Exact<{
  id: Scalars['String'];
}>;


export type CartQuery = { __typename?: 'Query', cart?: { __typename?: 'Cart', id: string, email?: string | null, sub_total: { __typename?: 'Money', formatted: string }, items: Array<{ __typename?: 'CartItem', id: string, quantity: number, name?: string | null, description?: string | null, image?: { __typename?: 'Image', src: string, alt: string } | null, line_total: { __typename?: 'Money', formatted: string, amount?: number | null, currency: { __typename?: 'Currency', thousands_separator?: string | null, decimal_separator?: string | null, decimals?: number | null, symbol?: string | null } } }> } | null };


export const CartDocument = `
    query cart($id: String!) {
  cart(id: $id) {
    id
    email
    sub_total {
      formatted
    }
    items {
      id
      quantity
      name
      description
      image {
        src
        alt
      }
      line_total {
        formatted
        amount
        currency {
          thousands_separator
          decimal_separator
          decimals
          symbol
        }
      }
    }
  }
}
    `;
export const useCartQuery = <
      TData = CartQuery,
      TError = unknown
    >(
      client: GraphQLClient,
      variables: CartQueryVariables,
      options?: UseQueryOptions<CartQuery, TError, TData>,
      headers?: RequestInit['headers']
    ) =>
    useQuery<CartQuery, TError, TData>(
      ['cart', variables],
      fetcher<CartQuery, CartQueryVariables>(client, CartDocument, variables, headers),
      options
    );