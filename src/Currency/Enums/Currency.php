<?php

declare(strict_types=1);

namespace PaltaSolutions\Currency\Enums;

enum Currency: string
{
    case AED = 'aed';
    case AFN = 'afn';
    case ALL = 'all';
    case AMD = 'amd';
    case ANG = 'ang';
    case AOA = 'aoa';
    case ARS = 'ars';
    case AUD = 'aud';
    case AWG = 'awg';
    case AZN = 'azn';
    case BAM = 'bam';
    case BBD = 'bbd';
    case BDT = 'bdt';
    case BGN = 'bgn';
    case BHD = 'bhd';
    case BIF = 'bif';
    case BMD = 'bmd';
    case BND = 'bnd';
    case BOB = 'bob';
    case BRL = 'brl';
    case BSD = 'bsd';
    case BTC = 'btc';
    case BTN = 'btn';
    case BWP = 'bwp';
    case BYR = 'byr';
    case BZD = 'bzd';
    case CAD = 'cad';
    case CDF = 'cdf';
    case CHF = 'chf';
    case CLP = 'clp';
    case CNY = 'cny';
    case COP = 'cop';
    case CRC = 'crc';
    case CUC = 'cuc';
    case CUP = 'cup';
    case CVE = 'cve';
    case CZK = 'czk';
    case DJF = 'djf';
    case DKK = 'dkk';
    case DOP = 'dop';
    case DZD = 'dzd';
    case EGP = 'egp';
    case ERN = 'ern';
    case ETB = 'etb';
    case ETH = 'eth';
    case EUR = 'eur';
    case FJD = 'fjd';
    case FKP = 'fkp';
    case GBP = 'gbp';
    case GEL = 'gel';
    case GHS = 'ghs';
    case GIP = 'gip';
    case GMD = 'gmd';
    case GNF = 'gnf';
    case GTQ = 'gtq';
    case GYD = 'gyd';
    case HKD = 'hkd';
    case HNL = 'hnl';
    case HRK = 'hrk';
    case HTG = 'htg';
    case HUF = 'huf';
    case IDR = 'idr';
    case ILS = 'ils';
    case INR = 'inr';
    case IQD = 'iqd';
    case IRR = 'irr';
    case ISK = 'isk';
    case JMD = 'jmd';
    case JOD = 'jod';
    case JPY = 'jpy';
    case KES = 'kes';
    case KGS = 'kgs';
    case KHR = 'khr';
    case KMF = 'kmf';
    case KPW = 'kpw';
    case KRW = 'krw';
    case KWD = 'kwd';
    case KYD = 'kyd';
    case KZT = 'kzt';
    case LAK = 'lak';
    case LBP = 'lbp';
    case LKR = 'lkr';
    case LRD = 'lrd';
    case LSL = 'lsl';
    case LYD = 'lyd';
    case MAD = 'mad';
    case MDL = 'mdl';
    case MGA = 'mga';
    case MKD = 'mkd';
    case MMK = 'mmk';
    case MNT = 'mnt';
    case MOP = 'mop';
    case MRO = 'mro';
    case MTL = 'mtl';
    case MUR = 'mur';
    case MVR = 'mvr';
    case MWK = 'mwk';
    case MXN = 'mxn';
    case MYR = 'myr';
    case MZN = 'mzn';
    case NAD = 'nad';
    case NGN = 'ngn';
    case NIO = 'nio';
    case NOK = 'nok';
    case NPR = 'npr';
    case NZD = 'nzd';
    case OMR = 'omr';
    case PAB = 'pab';
    case PEN = 'pen';
    case PGK = 'pgk';
    case PHP = 'php';
    case PKR = 'pkr';
    case PLN = 'pln';
    case PYG = 'pyg';
    case QAR = 'qar';
    case RON = 'ron';
    case RSD = 'rsd';
    case RUB = 'rub';
    case RWF = 'rwf';
    case SAR = 'sar';
    case SBD = 'sbd';
    case SCR = 'scr';
    case SDD = 'sdd';
    case SDG = 'sdg';
    case SEK = 'sek';
    case SGD = 'sgd';
    case SHP = 'shp';
    case SLL = 'sll';
    case SOS = 'sos';
    case SRD = 'srd';
    case STD = 'std';
    case SVC = 'svc';
    case SYP = 'syp';
    case SZL = 'szl';
    case THB = 'thb';
    case TJS = 'tjs';
    case TMT = 'tmt';
    case TND = 'tnd';
    case TOP = 'top';
    case TRY = 'try';
    case TTD = 'ttd';
    case TVD = 'tvd';
    case TWD = 'twd';
    case TZS = 'tzs';
    case UAH = 'uah';
    case UGX = 'ugx';
    case USD = 'usd';
    case UYU = 'uyu';
    case UZS = 'uzs';
    case VEB = 'veb';
    case VEF = 'vef';
    case VND = 'vnd';
    case VUV = 'vuv';
    case WST = 'wst';
    case XAF = 'xaf';
    case XCD = 'xcd';
    case XBT = 'xbt';
    case XOF = 'xof';
    case XPF = 'xpf';
    case YER = 'yer';
    case ZAR = 'zar';
    case ZMW = 'zmw';
    case WON = 'won';

    public function toUpperCase(): string
    {
        return strtoupper($this->value);
    }

    public function symbol(): string
    {
        return match($this)
        {
            self::EUR => '€',
            self::USD => '$',
        };
    }

    public function decimals(): int
    {
        return match($this)
        {
            self::EUR => 2,
            self::USD => 2,
        };
    }

    public function thousandsSeparator(): string
    {
        return match($this)
        {
            self::EUR => ',',
            self::USD => '.',
        };
    }

    public function decimalSeparator(): string
    {
        return match($this)
        {
            self::EUR => '.',
            self::USD => ',',
        };
    }
}
