//
//  EditControlLayer.h
//  bridge
//
//  Created by sandeep m on 05/03/2011.
//  Copyright 2011 bri. All rights reserved.
//

#import <Foundation/Foundation.h>
#import "cocos2d.h"
#import "CocosUtility.h"
#import "Constants.h"
#import "BridgeContext.h"
#import "Bridge.h"
#import "DrawBridge.h"
@interface EditControlLayer : CCLayer {

	CCRenderTexture* target;
	CCSprite* brush;
	
	Bridge *bridge;
}

@end
