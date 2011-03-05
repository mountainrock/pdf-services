#import "EditorScene.h"
#import "EditViewLayer.h"
#import "EditControlLayer.h"

@implementation EditorScene


+(id) scene
{
	CCScene *scene = [CCScene node];
	EditViewLayer *editView =[EditViewLayer node];
	EditControlLayer *editControl =[EditControlLayer node];

	//[editView setScene:scene];
//	[editControl setScene:scene];
	
	[scene addChild: editView z:0 tag:1];
	[scene addChild: editControl z:0 tag:2];	
	
	return scene;
}

- (void) dealloc{
	[super dealloc];
}
@end
