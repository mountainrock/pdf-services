//
//  Edge.m
//  bridge
//
//  Created by sandeep m on 06/03/2011.
//  Copyright 2011 bri. All rights reserved.
//

#import "Edge.h"


@implementation Edge

@synthesize start;
@synthesize end;
@synthesize material;
@synthesize body;
@synthesize image;

- (id)initWithPoint:(CGPoint)s :(CGPoint)e{

	self = [super init];
	if (self != nil){
		self.start =s;
		self.end= e;
	}
	return self;
}


@end
