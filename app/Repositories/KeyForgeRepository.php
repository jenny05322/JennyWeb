<?php

namespace App\Repositories;

class KeyForgeRepository
{
    private $decks = [
        '破碎的堡壘協力者布萊斯' => [
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_001_7C854VPW72RH_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_007_CFRV9R6JG7P7_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_013_967HJV9Q3J5P_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_018_Q84XVC2GVCPR_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_022_5F6F47CPQM7J_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_029_97VGG57XM738_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_030_X82H79CQ6XH6_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_030_X82H79CQ6XH6_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_033_FGH2M9G9W45J_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_039_Q64CQC29J542_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_044_HP3GQM2F73G5_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_048_CPX86RFXW765_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_109_9382CVHW3F7H_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_109_9382CVHW3F7H_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_123_R3C97J8JMPRV_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_125_H2RWQ5VF7V7_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_135_GVHX66578HV5_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_138_WVWFRR3PMG3H_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_139_678M74P9FW66_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_144_7XJ66GGGX9P3_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_145_65HF32HQGF2G_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_145_65HF32HQGF2G_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_149_GW4755VJMRRP_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_156_4F6VP56RFQQ5_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_162_J3M2V5CXFJ4W_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_173_H5C875HQR3RC_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_178_7J9MG8W9F6GM_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_187_886VP3RR6C5F_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_199_FW92QH6WPGCW_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_200_CM3V8FW8C2PG_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_202_99C5PXMWC2M7_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_202_99C5PXMWC2M7_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_202_99C5PXMWC2M7_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_205_GPCHG3XCV2MV_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_207_C938GRH2C993_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_211_PQFJWQ3VVVGJ_zh-hant.png',
        ],
        '村落地方官烏爾裡希' => [
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_115_4J2C745JC5V2_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_120_V59VPJJ255WQ_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_125_H2RWQ5VF7V7_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_133_FJGQFR6XJPHQ_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_136_82MF23JH58M3_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_138_WVWFRR3PMG3H_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_139_678M74P9FW66_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_140_GGR9WQGX52CC_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_144_7XJ66GGGX9P3_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_145_65HF32HQGF2G_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_154_M7WH2HV6J2FX_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_157_4FCPWQMVGPC_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_163_HWF789XR9CMR_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_166_FC5W5F2668JC_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_171_C9HXR9JCPGP9_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_172_4CX23PH9H69J_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_182_QC7VW6G544RQ_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_185_6C5RX4PMJ5R2_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_187_886VP3RR6C5F_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_203_8JJ739HGPCPC_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_203_8JJ739HGPCPC_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_203_8JJ739HGPCPC_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_207_C938GRH2C993_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_210_HCXQ277C22FW_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_220_J4PRQX77RXV8_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_220_J4PRQX77RXV8_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_224_J975CJ57VPP9_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_226_VMCJ79WHJVR2_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_238_4GJR4VPM7M26_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_238_4GJR4VPM7M26_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_254_W9QVJ9XWF94R_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_255_HX7GPH8C78C2_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_257_WC74XH7M2MJW_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_257_WC74XH7M2MJW_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_257_WC74XH7M2MJW_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_261_GRHXCM2HH6W2_zh-hant.png',
        ],
        '謙卑者費爾法克斯' => [
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_001_7C854VPW72RH_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_001_7C854VPW72RH_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_007_CFRV9R6JG7P7_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_012_8QF6VM4C23R9_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_012_8QF6VM4C23R9_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_018_Q84XVC2GVCPR_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_027_5G98X8WW3V6G_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_030_X82H79CQ6XH6_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_032_PVV2WC6R6QWP_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_033_FGH2M9G9W45J_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_035_M3H9MVCF63W7_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_042_6G82WPR8965X_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_055_7CJ4H2WMJWQ2_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_058_7RV7CX53R83P_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_062_8WF3JF84X9VM_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_075_5WF77V8WRRPP_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_077_46M5PVW2VRX9_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_081_GM7WM322M4_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_089_RF2PX33PJW8W_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_092_CRW34FMH3JF2_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_097_RM5XHC9QXGC5_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_097_RM5XHC9QXGC5_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_099_C63GPXC7XM83_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_103_PMC43W3QPFW4_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_327_W6VV383R4X8P_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_330_R4Q6P7M74J89_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_333_4J9WMP4Q2F2G_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_342_CCCJH6Q4C2GR_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_358_C2FM8V788JM5_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_358_C2FM8V788JM5_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_361_WHJM9F6QF2MF_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_362_HW3R4QRJGGMM_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_363_3RCHH4F7H4XF_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_367_54RJ37XJPQ2_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_368_MC5PG9FQ3766_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_370_J935FXX4XCJW_zh-hant.png',
        ],
        '演奏者柯恩' => [
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_001_7C854VPW72RH_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_010_48CVW9F66MJ8_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_012_8QF6VM4C23R9_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_012_8QF6VM4C23R9_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_016_HQJ525M2CVG9_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_016_HQJ525M2CVG9_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_016_HQJ525M2CVG9_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_018_Q84XVC2GVCPR_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_022_5F6F47CPQM7J_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_030_X82H79CQ6XH6_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_046_MXF2PV92XQPW_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_049_3J962PMQJRJ6_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_057_QR3X35J5GWCR_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_059_WW6PQP2CGM8H_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_062_8WF3JF84X9VM_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_062_8WF3JF84X9VM_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_083_9V7X379WFV8V_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_085_C72X25358RG2_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_092_CRW34FMH3JF2_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_092_CRW34FMH3JF2_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_096_4J8576237M3X_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_101_9W755VJWMG92_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_105_Q3C3948M2HPH_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_106_4G49CMC5XCX4_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_212_W36G9HXF9RQ7_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_217_RWHMP875732G_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_232_9XQ8F9638GX2_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_236_VWG6GMX929C6_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_237_MMHF7CR6FMJ2_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_239_FR9V84W6X65C_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_251_P4MXH8G4VPX4_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_254_W9QVJ9XWF94R_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_255_HX7GPH8C78C2_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_257_WC74XH7M2MJW_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_260_MJV7XGGFVMQC_zh-hant.png',
            'https://cdn.keyforgegame.com/media/card_front/zh-hant/341_266_F6GMMXCFJ9PC_zh-hant.png',
        ]
    ];

    public function getDecks()
    {
        return collect($this->decks)->keys();
    }

    public function getCardsByDeck($deck)
    {
        if (isset($this->decks[$deck])) {
            return collect($this->decks[$deck]);
        } else {
            return null;
        }
    }
}
